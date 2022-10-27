$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})

$('#admin-report-list a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
})



function updateFaculty(uid) {
    var dept = document.getElementById('dept'.concat(uid));
    var desig = document.getElementById('desig'.concat(uid));

    $.ajax({
        url: "/faculties/update",
        type: "POST",
        data: {
            uid: uid,
            dept: dept.value,
            desig: desig.value,
        },
        success: function (data) {
            // alert('Update Successful.');
            location.reload();
        }, error: function (data) {
            alert('Error updating faculty.');
        }
    });
    
    console.log(dept.value + " " + desig.value);
}

function updateYear(year, quarter) {
    $.ajax({
        url: "/years/update",
        type: "POST",
        data: {
            year: year,
            quarter: quarter,
        },
        success: function (data) {
            // alert('Update Successful.');
            location.reload();
        }, error: function (data) {
            alert('Error updating year.');
        }
    });

    // console.log(year +" "+ quarter)
}


//----- View Functions
//----------------
//------------
//--------
//----
//
function addRow(tbl_Id, fields) {
    var table = document.getElementById(tbl_Id);
    var row = table.insertRow(table.rows.length - 1);
    for (var a = fields.length - 1; a >= 0; a--) {
        if (fields[a] == "date")
            row.insertCell(0).innerHTML = "<input type='" + fields[a] + "' class='form-control' required id='" + fields[a] + "_" + tbl_Id + "' name='" + fields[a] + "_" + tbl_Id + "[]'>";
        else
            row.insertCell(0).innerHTML = "<input type='text' class='form-control' required id='" + fields[a] + "_" + tbl_Id + "' name='" + fields[a] + "_" + tbl_Id + "[]'>";
    }
}

function addRow2(tbl_Id, fields) {
    var table = document.getElementById(tbl_Id);
    var row = table.insertRow(table.rows.length - 1);
    for (var a = fields.length - 1; a >= 1; a--) {
        if (fields[a] == "date")
            row.insertCell(0).innerHTML = "<input type='" + fields[a] + "' class='form-control' required id='" + fields[a] + "_" + tbl_Id + "' name='" + fields[a] + "_" + tbl_Id + "[]'>";
        else
            row.insertCell(0).innerHTML = "<input type='text' class='form-control' required id='" + fields[a] + "_" + tbl_Id + "' name='" + fields[a] + "_" + tbl_Id + "[]'>";
    }
    row.insertCell(0).innerHTML = "<select class='custom-select' required id='" + fields[a] + "_" + tbl_Id + "' name='" + fields[a] + "_" + tbl_Id + "[]'><option value='local'>Local</option><option value='Regional'>Regional</option><option value='National'>National</option><option value='International'>International</option></select>";
}


