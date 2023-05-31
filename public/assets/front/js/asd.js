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




