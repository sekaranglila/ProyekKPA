console.log(namapeserta);
console.log(namapeserta_err);
console.log(fotopeserta_err);

var createRow = function() {
    var count = $('#count-member').val();
    var and = "";
    $('#anggota').empty();
    $('#anggota').append('<tr><th>No</th><th>Nama Pemain</th><th>Foto</th></tr>');
    for (var i = 1; i <= count; i++) {
        var el = '<tr>';
        el += '<th>' + i + '</th>';
        el += '<td><input type="text" name=name' + i + ' value="'+namapeserta[i]+'" style="width: 100%;"></td>';
        el += '<td><input type="file" name=photo' + i + '></td>';
        el += '<td>';
        if (namapeserta_err[i] != "" && fotopeserta_err[i] != "") {
            and = " & ";
        } else {
            and = "";
        }
        el += '<span class="error">'+namapeserta_err[i]+'</span>';
        el += '<span class="error">'+and+'</span>';
        el += '<span class="error">'+fotopeserta_err[i]+'</span>';
        el += '</td></tr>';
        $('#anggota').append(el);
    }
}

$('#count-member').change(createRow);
createRow();