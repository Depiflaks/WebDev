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

const text_input_tests = [""];

const form = document.querySelector("form");

const alertBlock = {
    img: document.querySelector("#alert-icon"),
    obj: document.querySelector(".alert"),
}

const switchBlock = {
    img: document.querySelector("#hide-switch img"),
    obj: document.querySelector("#hide-switch"),
};
let hidden = true;

const email = new TextInput(document.querySelector("#email-block"));
const password = new TextInput(document.querySelector("#password-block"));



const text_inputs = [email, password];

function alertError(text) {
    document.querySelector(".login-block h1").style = "margin-bottom: 34px;";
    alertBlock.obj.classList.remove("hidden");
    alertBlock.obj.classList.remove("alert_complete");
    alertBlock.obj.classList.add("alert_error");
    alertBlock.obj.classList.add("show");
    alertBlock.img.src = "./static/admin/assets/alert-circle.svg";
    alertBlock.obj.querySelector("p").innerHTML = text;
}

function alertComplete() {
    document.querySelector(".login-block h1").style = "margin-bottom: 34px;";
    alertBlock.obj.classList.remove("hidden");
    alertBlock.obj.classList.remove("alert_error");
    alertBlock.obj.classList.add("alert_complete");
    alertBlock.obj.classList.add("show");
    alertBlock.img.src = "./static/admin/assets/check-circle.svg";
    alertBlock.obj.querySelector("p").innerHTML = "Publish Complete!";
}

function hidePassword() {
    if (hidden) {
        hidden = false;
        switchBlock.img.src = "./static/login/assets/eye-off.svg";
        password.input.classList.remove("hide-password");
    } else {
        hidden = true;
        switchBlock.img.src = "./static/login/assets/eye.svg";
        password.input.classList.add("hide-password");
    }
}

function updateValues() {
    for (let i = 0; i < text_inputs.length; i++) {
        text_inputs[i].update();
    }
}

function testTextInputs() {
    let result = true;
    for (let i = 0; i < text_inputs.length; i++) {
        let f = false;
        for (let j in text_input_tests) {
            f = text_inputs[i].test(text_input_tests[j]);
            if (f) {
                text_inputs[i].showTip("this field cannot be empty");
                result = false;
            }
        }
        if (!f) {
            text_inputs[i].hideTip()
        }
    }
    return result;
}

function onSubmit(event) {
    event.preventDefault();

    let testingResult = true;
    updateValues();
    testingResult &= testTextInputs();

    if (!testingResult) {
        alertError("A-Ah! Check all fields");
        return 0;
    }

    const form_data = {
        email: email.value,
        password: password.value,
    };
    
    const json_data = JSON.stringify(form_data);

    console.log(json_data);
    fetch('http://localhost:8001/api/login', {
        method: 'POST',
        headers: {},
        body: json_data
    })
    .then(response => {
        console.log(response);
        if (response.ok) {
            window.location.href = "http://localhost:8001/admin";
        } else if (response.status == 401) {
            alertError("Wrong password or email :(");
        }
    });
}

form.addEventListener("submit", onSubmit);
switchBlock.obj.addEventListener("click", hidePassword);
