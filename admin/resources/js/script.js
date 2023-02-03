function ToggleCheckBox(elem) {

    var TickLine1 = elem.querySelector(".tick>.Tickline1")
    var Tickline2 = elem.querySelector(".tick>.Tickline2")
    if (elem.getAttribute("data-status") == "none") {
        Tickline2.style.width = "40px"
        Tickline2.style.top = "52px"
        Tickline2.style.left = "1px"

        elem.style.boxShadow = " 0px 2px 30px 12px rgba(0, 222, 37, 0.541)"
        setTimeout(() => {
            elem.style.boxShadow = " none"
        }, 1500)
        setTimeout(function() {

            TickLine1.style.width = "80px"
            TickLine1.style.top = "42px"
            TickLine1.style.left = "19px"
        }, 200)



        elem.setAttribute("data-status", "block")
    } else {
        TickLine1.style.width = "0px"
        TickLine1.style.top = "65px"
        TickLine1.style.left = "29px"

        setTimeout(function() {
            Tickline2.style.width = "0px"
            Tickline2.style.top = "39px"
            Tickline2.style.left = "10px"
        }, 200)



        elem.setAttribute("data-status", "none")
    }
}

function changeStatus(id) {

    var brandId = id;
    var statusChange = document.getElementById("toggleStatus" + brandId);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {
                window.location = window.location.href;
            } else if (text == 'Activated') {
                window.location = window.location.href;
            } else {
                window.location = window.location.href;
            }
        }
    }

    r.open("GET", "statusChangeProcess.php?id=" + brandId, true);
    r.send();

}

function changeStatus2(id) {

    var brandId = id;
    var statusChange = document.getElementById("toggleStatus" + brandId);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {} else if (text == 'Activated') {} else {
                window.location = window.location.href;
            }
        }
    }

    r.open("GET", "statusChangeProcess.php?id=" + brandId, true);
    r.send();

}


function changeStatusCategory2(id) {

    var category = id;
    var statusChange = document.getElementById("toggleStatus" + category);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {} else if (text == 'Activated') {} else {
                window.location = window.location.href;
            }
        }
    }

    r.open("GET", "categoryStatusChangeProcess.php?id=" + category, true);
    r.send();

}


function changeStatusCategory(id) {

    var category = id;
    var statusChange = document.getElementById("toggleStatus" + category);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {
                window.location = window.location.href;
            } else if (text == 'Activated') {
                window.location = window.location.href;
            } else {
                window.location = window.location.href;
            }
        }
    }

    r.open("GET", "categoryStatusChangeProcess.php?id=" + category, true);
    r.send();

}

function changeStatusSubCategory(id) {

    var category = id;
    var statusChange = document.getElementById("toggleStatus" + category);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {} else if (text == 'Activated') {} else {
                window.location = window.location.href;
            }
        }
    }

    r.open("GET", "subCategoryStatusChangeProcess.php?id=" + category, true);
    r.send();

}

function changeStatusSubCategory2(id) {

    var category = id;
    var statusChange = document.getElementById("toggleStatus" + category);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {
                window.location = window.location.href;
            } else if (text == 'Activated') {
                window.location = window.location.href;
            } else {
                window.location = window.location.href;
            }
        }
    }

    r.open("GET", "subCategoryStatusChangeProcess.php?id=" + category, true);
    r.send();

}

function changeStatusProduct2(id) {

    var category = id;
    var statusChange = document.getElementById("toggleStatus" + category);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {
                window.location = window.location.href;
            } else if (text == 'Activated') {
                window.location = window.location.href;
            } else {
                window.location = window.location.href;
            }
        }
    }

    r.open("GET", "productStatusChangeProcess.php?id=" + category, true);
    r.send();

}

function changeStatusProduct(id) {

    var category = id;
    var statusChange = document.getElementById("toggleStatus" + category);


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == 'Deactivated') {} else if (text == 'Activated') {} else {
                window.location = window.location.href;
            }

        }
    }

    r.open("GET", "productStatusChangeProcess.php?id=" + category, true);
    r.send();

}

function modalOpen(id) {
    var employeeId = id;


    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById('modalContent').innerHTML = text;
            document.getElementById('modal').style.display = 'block';
        }
    }

    r.open("GET", "editModal.php?e=" + employeeId, true);
    r.send();

}


function modalOpenCategory(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById('modalContent').innerHTML = text;
            document.getElementById('modal').style.display = 'block';
        }
    }

    r.open("GET", "editModalCategory.php?id=" + id, true);
    r.send();

}

function modalOpenSubCategory(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById('modalContent').innerHTML = text;
            document.getElementById('modal').style.display = 'block';
        }
    }

    r.open("GET", "editModalSubCategory.php?id=" + id, true);
    r.send();

}


function saveChange(id) {
    var employeeId = id;
    var name = document.getElementById('name').value;

    var form = new FormData();
    form.append("id", id);
    form.append("name", name);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 'success') {
                document.getElementById('modal').style.display = 'none';
                Swal.fire(
                    'Done',
                    'Save changed Successfully.',
                    'success'
                ).then((result) => {
                    window.location = window.location.href;
                })
            } else {
                Swal.fire(
                    'Error',
                    text,
                    'error'
                )
            }
        }
    }

    r.open("POST", "saveChange.php", true);
    r.send(form);

}

function saveChangeCategory(id) {
    var name = document.getElementById('name').value;

    var form = new FormData();
    form.append("id", id);
    form.append("name", name);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 'success') {
                document.getElementById('modal').style.display = 'none';
                Swal.fire(
                    'Done',
                    'Save changed Successfully.',
                    'success'
                ).then((result) => {
                    window.location = window.location.href;
                })
            } else {
                Swal.fire(
                    'Error',
                    text,
                    'error'
                )
            }
        }
    }

    r.open("POST", "saveChangeCategory.php", true);
    r.send(form);

}

function saveChangeSubCategory(id) {
    var name = document.getElementById('name').value;

    var form = new FormData();
    form.append("id", id);
    form.append("name", name);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == 'success') {
                document.getElementById('modal').style.display = 'none';
                Swal.fire(
                    'Done',
                    'Save changed Successfully.',
                    'success'
                ).then((result) => {
                    window.location = window.location.href;
                })
            } else {
                Swal.fire(
                    'Error',
                    text,
                    'error'
                )
            }
        }
    }

    r.open("POST", "saveChangeSubCategory.php", true);
    r.send(form);

}

function deleteSubscriber(id) {

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete it?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            var form = new FormData();
            form.append("id", id);

            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    var text = r.responseText;
                    if (text == 'success') {
                        Swal.fire(
                            'Done',
                            'Email Deleted',
                            'success'
                        ).then((result) => {
                            window.location = window.location.href;
                        })
                    } else {
                        Swal.fire(
                            'Error',
                            "Try Again Later",
                            'error'
                        )
                    }
                }
            }

            r.open("POST", "deleteSubscriber.php", true);
            r.send(form);
        }
    })


}

function deleteMsg(id) {

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete it?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            var form = new FormData();
            form.append("id", id);

            var r = new XMLHttpRequest();
            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    var text = r.responseText;
                    if (text == 'success') {
                        Swal.fire(
                            'Done',
                            'Message Deleted',
                            'success'
                        ).then((result) => {
                            window.location = window.location.href;
                        })
                    } else {
                        Swal.fire(
                            'Error',
                            "Try Again Later",
                            'error'
                        )
                    }
                }
            }

            r.open("POST", "deleteMsg.php", true);
            r.send(form);
        }
    })


}


function viewMsg(id) {

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            document.getElementById('modalContent').innerHTML = text;
            document.getElementById('modal').style.display = 'block';
        }
    }

    r.open("GET", "msgViewModal.php?id=" + id, true);
    r.send();

}