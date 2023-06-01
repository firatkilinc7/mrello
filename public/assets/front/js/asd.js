const swiperMode = () => {
    let swiper = Swiper;
    let init = false;
    let desktop = window.matchMedia('(min-width: 1025px)');
    let tablet = window.matchMedia('(min-width: 769px) and (max-width: 1024px)');

    if (!desktop.matches) {
        if (!init) {
            init = true;
            swiper = new Swiper('.swiper', {

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    type: 'bullets',
                },

                sliderPerView: 1,
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    }
                }
            });
            let cardCheck = document.querySelectorAll('.card__todo');
            cardCheck.forEach(card => {
                card.addEventListener('touchmove', (event) => {
                    swiper.slideNext(4000, false);
                })
            })
        }

    } else if (tablet.matches) {
        $('.swiper').addClass( "disabled" );
        init = false;
    } else if (desktop.matches) {
        $('.swiper').addClass( "disabled" );
        init = false;
    }
    return swiper;

}


window.addEventListener("load", function () {
    swiperMode();
});

/* On Resize*/
window.addEventListener("resize", function () {
    swiperMode();
});

// DragNDrop

let containerTdo = document.querySelector(".dashboard__cards-todo");
let containerInProgress = document.querySelector(
    ".dashboard__cards-inProgress"
);
let containerDone = document.querySelector(".dashboard__cards-done");
const root = document.getElementById("root");

let drake = dragula([containerTdo, containerInProgress, containerDone]);

drake.on("drop", function (el, target, source, sibling) {
    if (target === containerInProgress && target.children.length >= 6) {
        $(".ui.modal.pop-up__inprogress")
            .modal({ blurring: true }, { observeChanges: true })
            .modal("show");
    }
    for (const todo of todos) {
        if (+todo.todoId === +el.dataset.trelloId) {
            todo.todoColumn = target.dataset.columnId;
        }
    }
    localStorage.setItem("cards", JSON.stringify(todos));
});



//EKLEME BUTONU TIKLANDIGINDA MODAL I AC
const btnAdd = document.getElementsByClassName("btn__add");

for (var i = 0; i < btnAdd.length; i++) {
    btnAdd[i].addEventListener("click", () => {
        inputTitle.value = "";
        inputDescription.value = "";
        $("#modal_add")
            .modal({ blurring: true }, { allowMultiple: true })
            .modal("show")
            .modal({
                onApprove: function () {
                    $(".modal").modal("hide");
                },
            });

        $("#form-add").form(formSettings);
        $(".ui.dropdown").dropdown("restore defaults");
    });
}


//DUZENLEME BUTONU BASILDIĞINDA MODAL I AC
const btnEdit = document.getElementsByClassName("card__todo-edit");

for (var i = 0; i < btnEdit.length; i++) {
    btnEdit[i].addEventListener("click", () => {
        const clicked = event.target.closest(".card__todo");
        const inputTitle = document.getElementById("title-edit");
        const inputDescription = document.getElementById("desc-edit");

        inputTitle.value = clicked.querySelector(".card__todo-title").textContent;
        inputDescription.value = clicked.querySelector(".todo-description").textContent;

        $("#modal_edit")
            .modal({ blurring: true }, { allowMultiple: true })
            .modal("show")
            .modal({
                onApprove: function () {
                    $(".modal").modal("hide");
                },
            });

        $("#form-edit").form(formSettings);
        $(".ui.dropdown").dropdown("restore defaults");
    });
}

//DELETE BUTONU TIKLANDIĞINDA UYARI MODAL I AC

let btnDeleteAll = document.getElementsByClassName("btn__delete");

for (var j = 0; j < btnDeleteAll.length; j++){

    btnDeleteAll[j].addEventListener("click", (event) => {
        $(".ui.modal.pop-up__delete-all").modal({ blurring: true }).modal("show");
    });
}


//Create Task

const createTodo = (todoTitle, todoDescription, created_at, taskId, todoImg, todoUser) => {
    const todoCase = document.createElement("div");
    todoCase.className = "card__todo";

    const cardTop = document.createElement("div");
    cardTop.className = "card_top";

    const todoTitleHead = document.createElement("h3");
    todoTitleHead.className = "card__todo-title title4";
    const todoTitleText = document.createTextNode(todoTitle);

    const todoDate = document.createElement("div");
    const date = created_at;
    todoDate.className = "card__todo-title";

    const todoDescriptionCard = document.createElement("div");
    todoDescriptionCard.className = "todo-description";
    const todoDescriptionText = document.createTextNode(todoDescription);

    todoCase.append(cardTop);
    cardTop.append(todoTitleHead);
    todoTitleHead.append(todoTitleText);
    cardTop.append(todoDate);
    todoDate.append(date);
    todoDescriptionCard.append(todoDescriptionText);
    todoCase.append(todoDescriptionCard);

    const cardBottom = document.createElement("div");
    cardBottom.className = "card_bottom";

    const user = document.createElement("div");
    user.className = "user";

    const todoAuthor = document.createElement("img");
    todoAuthor.className = "card__todo-author";
    const imgAtr = document.createAttribute('src');
    imgAtr.value = todoImg;
    todoAuthor.setAttributeNode(imgAtr);

    const todoUserName = document.createElement("p");
    const todoUserNameText = document.createTextNode(todoUser);
    todoUserName.className = "todo__user-name";

    const cardEdit = document.createElement("div");
    cardEdit.className = "card__todo-btns";

    const linkEdit = document.createElement("a");
    linkEdit.className = "card__todo-edit";
    linkEdit.dataset.taskId = taskId;
    const linkEditPicture = document.createElement("i");
    linkEditPicture.className = "edit icon";
    linkEditPicture.dataset.type = 'edit-card';

    const linkDelete = document.createElement("a");
    linkDelete.className = "card__todo-delete";
    linkDelete.dataset.taskId = taskId;
    const linkDeletePicture = document.createElement("i");
    linkDeletePicture.className = "trash alternate icon";
    linkDeletePicture.dataset.type = 'delete-one';

    todoCase.append(cardBottom);
    cardBottom.append(user);
    user.append(todoAuthor);
    user.append(todoUserName);
    cardBottom.append(cardEdit);
    cardEdit.append(linkEdit);
    cardEdit.append(linkDelete);
    linkEdit.append(linkEditPicture);
    linkDelete.append(linkDeletePicture);
    todoUserName.append(todoUserNameText);

    todoCase.setAttribute('id', 'todo-id');

    return todoCase;
}



