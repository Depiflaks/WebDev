const article_preview = document.querySelector(".information__article-preview");
const post_card_preview = document.querySelector(".information__post-card-preview");

class TextInput {
    constructor(element) {
        this.element = element;
        this.input = element.querySelector("input");
        this.value = this.input.value;
        this.tip = element.querySelector(".input-block__tip");

        this.input.addEventListener("change", (e) => {this.updatePreview(e)})
    }

    update() {
        this.value = this.input.value.trim();
    }

    test(prov) {
        return this.value == prov;
    }

    showTip(error) {
        this.input.classList.add("input-block__text-area_error");
        this.tip.innerHTML = error;
    }

    hideTip() {
        this.input.classList.remove("input-block__text-area_error");
        this.tip.innerHTML = "";
    }

    updatePreview(event) {
        this.update();
        switch (this.element.id) {
            case "title-block":
                article_preview.querySelector("h2").innerHTML = this.value;
                post_card_preview.querySelector("h1").innerHTML = this.value;
                break;
            case "description-block":
                article_preview.querySelector("h3").innerHTML = this.value;
                post_card_preview.querySelector("h2").innerHTML = this.value;
                break;
            case "name-block":
                post_card_preview.querySelector("p").innerHTML = this.value;
                break;
        }
    }
}

class TextArea {
    constructor(element) {
        this.element = element;
        this.area = element.querySelector("textarea");
        this.value = this.area.value;
        
        this.tip = element.querySelector(".input-block__tip");
    }

    update() {
        this.value = this.area.value.trim();
    }

    test(prov) {
        return this.value == prov;
    }

    showTip(error) {
        this.area.classList.add("input-block__content-area_error");
        this.tip.innerHTML = error;
    }

    hideTip() {
        this.area.classList.remove("input-block__content-area_error");
        this.tip.innerHTML = "";
    }
}

class DateInput {
    constructor(element) {
        this.element = element;
        this.input = element.querySelector("input");
        this.value = this.input.value;
        
        this.tip = element.querySelector(".input-block__tip");
        
        this.input.addEventListener("change", (e) => {this.updatePreview(e)});
    }

    update() {
        this.value = this.input.value;
    }

    test(prov) {
        return this.value == prov;
    }

    showTip(error) {
        this.input.classList.add("input-block__content-area_error");
        this.tip.innerHTML = error;
    }

    hideTip() {
        this.input.classList.remove("input-block__content-area_error");
        this.tip.innerHTML = "";
    }

    updatePreview(event) {
        this.update();
        post_card_preview.querySelector("time").innerHTML = this.value;
    }
}

class AvatarInput {
    constructor(element) {
        this.init(element);

        this.reader = new FileReader();

        this.isUploaded = false;
        this.deleteAvatar();

        this.input.addEventListener("change", (e) => this.onChange(e));
        this.deleteButton.addEventListener("click", (e) => this.deleteAvatar());
        this.reader.addEventListener("load", (e) => this.setAvatar(e));
    }

    init(element) {
        this.element = element;
        this.input = element.querySelector(".input-block__img-input input");
        this.uploadIcon = element.querySelector(".input-block__img-input img");
        this.avatar = element.querySelector(".input-block__avatar");
        this.avatarIcon = element.querySelector(".input-block__avatar img");
        this.previewAvatarIcon = document.querySelector(".most-recent__profile-picture img");
        
        this.delete = element.querySelector(".input-block__img-delete");
        this.deleteButton = element.querySelector(".input-block__img-delete input");
    }

    onChange(event) {
        const file = event.target.files[0];
        this.reader.readAsDataURL(file);
    }

    setAvatar(event) {
        this.imageUrl = event.target.result;
        this.isUploaded = true;

        this.delete.classList.remove("hidden");
        this.uploadIcon.classList.remove("hidden");
        this.avatar.classList.remove("input-block__avatar_none");

        this.avatarIcon.classList.add("image_uploaded");
        this.avatarIcon.src = this.imageUrl;

        this.previewAvatarIcon.classList.add("image_uploaded");
        this.previewAvatarIcon.src = this.imageUrl;
    }

    deleteAvatar() {
        this.isUploaded = false;

        this.delete.classList.add("hidden");
        this.uploadIcon.classList.add("hidden");
        this.avatar.classList.add("input-block__avatar_none");
        this.avatarIcon.classList.remove("image_uploaded");
        this.avatarIcon.src = "static/admin/assets/upload_photo.svg";

        this.previewAvatarIcon.classList.remove("image_uploaded");
        this.previewAvatarIcon.src = "";
    }
}

class ImageInput {
    constructor(element) {
        this.init(element);

        this.reader = new FileReader();

        this.isUploaded = false;
        this.deleteImage();
        for (let input of this.inputList) {
            input.addEventListener("change", (e) => this.onChange(e));
        }
        
        this.deleteButton.addEventListener("click", (e) => this.deleteImage());
        this.reader.addEventListener("load", (e) => this.setImage(e));
    }

    init(element) {
        this.element = element;

        this.inputBlockList = element.querySelectorAll(".input-block__img-input");

        this.inputList = element.querySelectorAll(".input-block__img-input input");

        this.area = element.querySelector(".input-block__hero-img");
        this.areaImage = element.querySelector(".input-block__hero-img img");

        this.delete = element.querySelector(".input-block__img-delete");
        this.deleteButton = element.querySelector(".input-block__img-delete input");

        this.label = element.querySelector(".input-block__sub-caption");

        this.tip = element.querySelector(".input-block__tip");
    }

    onChange(event) {
        const file = event.target.files[0];
        this.reader.readAsDataURL(file);
    }

    setImage(event) {
        this.imageUrl = event.target.result;
        this.isUploaded = true;

        this.delete.classList.remove("hidden");
        this.inputBlockList[0].classList.add("hidden");
        this.inputBlockList[1].classList.remove("hidden");
        this.label.classList.add("hidden")
        this.area.classList.remove("input-block__hero-img_none");

        this.areaImage.classList.remove("hidden");
        this.areaImage.src = this.imageUrl;
        
        switch (this.element.id) {
            case "hero-block":
                article_preview.querySelector("img").classList.remove("hidden");
                article_preview.querySelector("img").src = this.imageUrl
                break;
            case "sub-hero-block":
                post_card_preview.querySelector(".most-recent__background-picture img").classList.remove("hidden");
                post_card_preview.querySelector(".most-recent__background-picture img").src = this.imageUrl
                break;
        }
    }

    deleteImage() {
        this.isUploaded = false;

        this.delete.classList.add("hidden");
        this.inputBlockList[0].classList.remove("hidden");
        this.inputBlockList[1].classList.add("hidden");
        this.label.classList.remove("hidden")
        this.area.classList.add("input-block__hero-img_none");

        this.areaImage.classList.add("hidden");
        this.areaImage.src = "";

        switch (this.element.id) {
            case "hero-block":
                article_preview.querySelector("img").classList.add("hidden");
                article_preview.querySelector("img").src = "";
                break;
            case "sub-hero-block":
                post_card_preview.querySelector(".most-recent__background-picture img").classList.add("hidden");
                post_card_preview.querySelector(".most-recent__background-picture img").src = "";
                break;
        }
    }

    showTip(error) {
        this.tip.innerHTML = error;
    }

    hideTip() {
        this.tip.innerHTML = "";
    }
}

const text_input_tests = [""];

const form = document.querySelector("form");
const input_list = document.querySelectorAll('.input-block');
const alertBlock = {
    img: document.querySelector("#alert-icon"),
    obj: document.querySelector(".alert"),
}

const title = new TextInput(document.querySelector("#title-block"));
const description = new TextInput(document.querySelector("#description-block"));
const author_name = new TextInput(document.querySelector("#name-block"));
const content = new TextArea(document.querySelector("#content-block"));

const featured = document.getElementById("checkbox-input");

const author_photo = new AvatarInput(document.querySelector("#avatar-block"));

const date = new DateInput(document.querySelector("#date-block"));

const hero_image = new ImageInput(document.querySelector("#hero-block"));
const sub_hero_image = new ImageInput(document.querySelector("#sub-hero-block"));

const text_inputs = [title, description, author_name, date, content];
const image_inputs = [hero_image, sub_hero_image];


function alertError() {
    alertBlock.obj.classList.remove("hidden");
    alertBlock.obj.classList.remove("alert_complete");
    alertBlock.obj.classList.add("alert_error");
    alertBlock.img.src = "./static/admin/assets/alert-circle.svg";
    alertBlock.obj.querySelector("p").innerHTML = "Whoops! Some fields need your attention :o";
}

function alertComplete() {
    alertBlock.obj.classList.remove("hidden");
    alertBlock.obj.classList.remove("alert_error");
    alertBlock.obj.classList.add("alert_complete");
    alertBlock.img.src = "./static/admin/assets/check-circle.svg";
    alertBlock.obj.querySelector("p").innerHTML = "Publish Complete!";
}   

function updateValues() {
    for (let i = 0; i < text_inputs.length; i++) {
        text_inputs[i].update();
        //console.log(text_inputs[i].value);
    }
}

function testTextInputs() {
    let result = true;
    for (let i = 0; i < text_inputs.length; i++) {
        let f = false;
        for (let j in text_input_tests) {
            f = text_inputs[i].test(text_input_tests[j])
        }
        if (f) {
            text_inputs[i].showTip("this field cannot be empty");
            result = false;
        } else {
            text_inputs[i].hideTip()
        }
    }
    return result;
}

function testImageInputs() {
    let result = true;
    for (let i = 0; i < image_inputs.length; i++) {
        let f = image_inputs[i].isUploaded;
        result &= f;
        if (!f) {
            image_inputs[i].showTip("you have to upload an image of your article");
        } else {
            image_inputs[i].hideTip();
        }
    }
    return result;
}

function onSubmit(event) {
    event.preventDefault();

    let testingResult = true;
    updateValues();
    testingResult &= testTextInputs();
    testingResult &= testImageInputs();

    if (!testingResult) {
        alertError();
        return 0;
    }

    alertComplete();

    const form_data = {
        title: title.value,
        subtitle: description.value,
        author: author_name.value,
        contents: content.value,
        publish_date: date.value,
        background_url: hero_image.imageUrl,
        hero_url: sub_hero_image.imageUrl,
        author_url: author_photo.imageUrl,
        featured: featured.checked ? 1 : 0,
    };
    
    const json_data = JSON.stringify(form_data);

    console.log(json_data);
    fetch('http://localhost:8001/api.php', {
        method: 'POST',
        body: json_data
    })
    .then(response => {
        console.log(response);
    });
}


form.addEventListener("submit", onSubmit)

