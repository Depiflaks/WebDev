class TextInput {
    constructor(element) {
        this.element = element
        this.input = element.querySelector("input")
        this.value = this.input.value;
        this.tip = element.querySelector(".input-block__tip");
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
}

class AvatarInput {

}

let text_input_tests = [""];

let form = document.querySelector("form");
let input_list = document.querySelectorAll('.input-block');
let alertBlock = {
    img: document.querySelector("#alert-icon"),
    obj: document.querySelector(".alert"),
}

console.log(alertBlock);

let title = new TextInput(input_list[0]);
let description = new TextInput(input_list[1]);
let authorName = new TextInput(input_list[2]);

let textInputs = [title, description, authorName];

function alertError() {
    alertBlock.obj.classList.remove("hidden");
    alertBlock.obj.classList.add("alert_error");
    alertBlock.img.src = "./static/admin/assets/alert-circle.svg";
    alertBlock.obj.querySelector("p").innerHTML = "Whoops! Some fields need your attention :o";
}

function alertComplete() {
    alertBlock.obj.classList.remove("hidden");
    alertBlock.obj.classList.add("alert_complete");
    alertBlock.img.src = "./static/admin/assets/check-circle.svg";
    alertBlock.obj.querySelector("p").innerHTML = "Publish Complete!";
}   

function updateValues() {
    for (let i = 0; i < textInputs.length; i++) {
        textInputs[i].update();
        console.log(textInputs[i].value);
    }
}

alertComplete();

function testTextInputs() {
    let f = false;
    for (let i = 0; i < textInputs.length; i++) {
        for (let j in text_input_tests) {
            f = textInputs[i].test(text_input_tests[j])
        }
        if (f) {
            textInputs[i].showTip("this field cannot be empty");
        } else {
            textInputs[i].hideTip()
        }
    }
    
}

function onSubmit(event) {
    event.preventDefault();
    updateValues();
    testTextInputs();
    
}


form.addEventListener("submit", onSubmit)

