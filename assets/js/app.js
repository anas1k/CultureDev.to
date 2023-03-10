/**
 * In this file app.js you will find all CRUD functions name.
 *
 */

// Validation for sensitive inputs
function validateName() {
    let Title = document.getElementById('TitleInput').value;
    let TitleRegex = /^[a-z A-Z 0-9]{5,}$/;
    if (Title == '' || !TitleRegex.test(Title)) {
        document.getElementById('TitleInput').setAttribute('style', 'color:red; border: 1px red solid ;');

        document.getElementById('ValidateTitle').innerText = 'Veuillez entrer un nom valide ! verifiez que le nom contient au minimum 5 caractéres et sans caractéres speciaux!!';
        document.getElementById('ValidateTitle').setAttribute('style', 'color:red;font-size:13px;');
    } else {
        document.getElementById('TitleInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateTitle').innerText = '';
    }
}
function validateDescription() {
    let Description = document.getElementById('DescriptionInput').value;
    let DescriptionRegex = /^[a-z A-Z 0-9.:,]{5,}$/;
    if (Description == '' || !DescriptionRegex.test(Description)) {
        document.getElementById('DescriptionInput').setAttribute('style', 'color:red; border: 1px red solid ;');
        document.getElementById('ValidateDescription').innerText = 'Veuillez entrer une description valide ! verifiez que la description contient au minimum 5 caractéres!!';
        document.getElementById('ValidateDescription').setAttribute('style', 'color:red;font-size:13px;');
    } else {
        document.getElementById('DescriptionInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateDescription').innerText = '';
    }
}

function validateSubject() {
    if (document.getElementById('SubjectInput').value == '' || !/^[a-z A-Z 0-9.:,]{5,}$/.test(document.getElementById('SubjectInput').value)) {
        document.getElementById('SubjectInput').setAttribute('style', 'color:red; border: 1px red solid ;');
        document.getElementById('ValidateSubject').innerText = 'Veuillez entrer une description valide ! verifiez que la description contient au minimum 5 caractéres!!';
        document.getElementById('ValidateSubject').setAttribute('style', 'color:red;font-size:13px;');
    } else {
        document.getElementById('SubjectInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateSubject').innerText = '';
    }
}
/* function validatePicture() {
    if (document.getElementById('PictureFileField').classList.contains('has-preview') != false) {
        document.getElementById('ValidatePicture').setAttribute('class', 'text-danger');
        document.getElementById('ValidatePicture').innerText = 'Veuillez choisr un fichier photo ! verifiez que la photo contient au maximum 10MB !!';
        document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:red;font-size:10px;');
    } else {
        document.getElementById('ValidatePicture').setAttribute('class', 'text-success');
        document.getElementById('ValidatePicture').innerText = 'Fichier photo valide !';
        document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:green;font-size:10px;');
    }
}
 */
$('#saveArticle').click(function (e) {
    if (document.getElementById('PictureFileField').classList.contains('has-preview') == false) {
        e.preventDefault();

        document.getElementById('TitleInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateTitle').innerText = '';

        document.getElementById('DescriptionInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateDescription').innerText = '';

        document.getElementById('ValidatePicture').setAttribute('class', 'text-danger');
        document.getElementById('ValidatePicture').innerText = 'Veuillez choisr un fichier photo ! verifiez que la photo contient au maximum 10MB !!';
        document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:red;font-size:10px;');
    }
});

// event listener for updateValidation
$('#updateArticle').click(function (ee) {
    if (document.getElementById('PictureFileField').classList.contains('has-preview') == false) {
        ee.preventDefault();

        document.getElementById('TitleInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateTitle').innerText = '';

        document.getElementById('DescriptionInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateDescription').innerText = '';

        document.getElementById('ValidatePicture').setAttribute('class', 'text-danger');
        document.getElementById('ValidatePicture').innerText = 'Veuillez choisr un fichier photo ! Verifiez que la photo contient au maximum 10MB !!';
        document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:red;font-size:10px;');
    }
});

function validateEmail() {
    let email = document.getElementById('EmailInput').value;
    let emailRegex = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;
    if (email == '' || !emailRegex.test(email)) {
        document.getElementById('EmailInput').setAttribute('style', 'color: red;border: 1px red solid;');
        document.getElementById('ValidateEmail').innerText = "Veuillez entrer un email valide ! Verifiez que l'email sans caractéres speciaux!!";
        document.getElementById('ValidateEmail').setAttribute('style', 'color:red;font-size:10px;');
    } else {
        document.getElementById('EmailInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateEmail').innerText = '';
    }
}
function validatePassword() {
    var password = document.getElementById('PasswordInput').value;
    var passwordRegex = /^[a-z A-Z 0-9]{5,}$/;
    if (password == '' || !passwordRegex.test(password)) {
        document.getElementById('PasswordInput').setAttribute('style', 'color: red;border: 1px red solid;');
        document.getElementById('ValidatePassword').innerText = 'Veuillez entrer un mot de passe valide ! Verifiez que le mot de passe contient au minimum 5 caractéres et sans caractéres speciaux!!';
        document.getElementById('ValidatePassword').setAttribute('style', 'color:red;font-size:10px;');
    } else {
        document.getElementById('PasswordInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidatePassword').innerText = '';
    }
}

function MultiForm() {
    var formInputs = document.getElementsByClassName('formul')[0];
    var plus = formInputs.cloneNode(true);
    plus.querySelector('.div-picture').querySelector('#PictureFileField').remove();
    let input_file = document.createElement('input');
    input_file.setAttribute('type', 'file');
    input_file.setAttribute('name', 'picture[]');
    plus.querySelector('.div-picture').querySelector('#picture-field').prepend(input_file);
    var form = document.getElementById('multii');
    plus.prepend(document.createElement('hr'));
    form.appendChild(plus);
}

// event listener for loginValidation
/* $('#LoginUser').click(function (e) {
    if (document.getElementById('EmailInput').value == '' || !/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/.test(document.getElementById('EmailInput').value)) {
        e.preventDefault();

        document.getElementById('PasswordInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidatePassword').innerText = '';

        document.getElementById('EmailInput').setAttribute('style', 'color: red;border: 1px red solid;');
        document.getElementById('ValidateEmail').innerText = "Veuillez entrer un email valide ! Verifiez que l'email sans caractéres speciaux!!";
        document.getElementById('ValidateEmail').setAttribute('style', 'color:red;font-size:10px;');
    } else if (document.getElementById('PasswordInput').value == '' || !/^[a-z A-Z0-9]{5,}$/.test(document.getElementById('PasswordInput').value)) {
        e.preventDefault();

        document.getElementById('EmailInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
        document.getElementById('ValidateEmail').innerText = '';

        document.getElementById('PasswordInput').setAttribute('style', 'color:red; border: 1px red solid ;');
        document.getElementById('ValidatePassword').innerText = 'Veuillez entrer un mot de passe valide ! Verifiez que le mot de passe contient au minimum 5 caractéres et sans caractéres speciaux!!';
        document.getElementById('ValidatePassword').setAttribute('style', 'color:red;font-size:10px;');
    }
}); */

function createArticle() {
    // initialiser Article form
    document.getElementById('form').reset();

    // Afficher le boutton save
    document.getElementById('saveArticle').style.display = 'block';
    document.getElementById('editArticle').style.display = 'none';
    document.getElementById('addArticle').style.display = 'block';

    // Ouvrir modal form
    $('#articleModal').modal('show');

    // Initialise Validation
    document.getElementById('DescriptionInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
    document.getElementById('ValidateDescription').innerText = '';

    document.getElementById('TitleInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
    document.getElementById('ValidateTitle').innerText = '';
    document.getElementById('ValidatePicture').innerText = '';
    document.getElementById('PictureFileField').setAttribute('style', 'border-radius: 1em !important; background-color: #151521 !important;');
    document.getElementById('PictureFileField').setAttribute('class', 'dropify-wrapper');
    document.getElementById('PreviewFileField').setAttribute('style', 'display:none;');
}

function GetArticle(id, idCategory, idAdmin) {
    // initialise Article form
    document.getElementById('form').reset();

    document.getElementById('saveArticle').style.display = 'none';
    document.getElementById('editArticle').style.display = 'block';
    document.getElementById('addArticle').style.display = 'none';

    // Initialise Article form
    $('#articleModal').modal('show');

    // Initialise Validation
    document.getElementById('DescriptionInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
    document.getElementById('ValidateDescription').innerText = '';

    document.getElementById('TitleInput').setAttribute('style', 'color:black; border: 1px #ced4da solid ;');
    document.getElementById('ValidateTitle').innerText = '';

    /* console.log(id); */

    document.getElementById('TitleInput').value = document.querySelector(`#ArticleTitle${id}`).innerText;

    document.getElementById('SubjectInput').value = document.querySelector(`#ArticleSubject${id}`).innerText;

    document.getElementById('CategoryInput').value = idCategory;

    document.getElementById('IdAdmin').value = idAdmin;

    document.getElementById('DescriptionInput').value = document.querySelector(`#ArticleDescription${id}`).innerText;

    document.getElementById('IdInput').value = id;

    // getting the image path from the image tag and setting it to the input field and previewing it
    let picTitle = document.querySelector(`#ArticlePicture${id}`).getAttribute('src');
    /* console.log(picTitle); */
    document.getElementById('PictureInput').setAttribute('src', picTitle);
    document.getElementById('PictureFileField').setAttribute('class', 'dropify-wrapper has-preview');
    document.getElementById('PreviewFileField').setAttribute('style', 'display:block;');
    document.querySelector('.dropify-render').innerHTML = `<img src="${picTitle}" alt="Picture" style="max-height: 100%;"/>`;
    document.getElementById('ValidatePicture').setAttribute('class', 'text-success');
    document.getElementById('ValidatePicture').innerText = 'Photo précédente deja selectionné ! Si vous voulez changer la photo veuillez entrer une nouvelle photo !!';
    document.getElementById('PictureFileField').setAttribute('style', 'height:10rem; border-radius: 1em !important;background-color: #151521 !important;border-color:green;font-size:10px;');
}

function DeleteArticle(id) {
    // Delete action confirmation using SweetAlert2 combined with Ajax
    // SweetAlert2 pop up
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this article?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull
        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Your article has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: '../core/allarticles.php',
                type: 'POST',
                data: { deleteArticle: id },
                dataType: 'html',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#Article${id}`).remove();
                },
            });
        }
    });
}

function GetCategory(id) {
    // initialiser Category form
    document.getElementById('saveCategory').style.display = 'none';
    document.getElementById('editButton').style.display = 'block';

    document.getElementById('NameInput').value = document.querySelector(`#CategoryName${id}`).innerText;
    document.getElementById('idInput').value = id;
}

function deleteCategory(id) {
    // Delete action confirmation using SweetAlert2 combined with Ajax
    // SweetAlert2 pop up
    Swal.fire({
        background: '#1e1e2d',
        color: '#F0F6FC',
        title: 'Are you sure you want to delete this category?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        // after confirmation is succesfull

        if (result.isConfirmed) {
            Swal.fire({ background: '#1e1e2d', color: '#F0F6FC', title: 'Deleted!', text: 'Your category has been deleted successfully. ', icon: 'error' });
            // using ajax to send data without refresh
            $.ajax({
                url: '../core/allcategories.php',
                type: 'POST',
                data: { DeleteCategory: id },
                dataType: 'HTML',
                success: function () {
                    // removing element from dom
                    document.querySelector(`#Category${id}`).remove();
                },
            });
        }
    });
}
