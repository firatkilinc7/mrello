<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<section class="section-dashboard">
      <div class="wrapper__dashboard swiper" id="root">
        <div class="swiper-wrapper">



          <div class="swiper-slide">
            <div class="dashboard dashboard__toDo">
              <div class="dashboard__content">
                <h2 class="title1 dashboard__title">To Do</h2>
              </div>

                <div class="card__todo" data-trello-id="1685100915511" id="todo-id"><div class="card_top"><h3 class="card__todo-title title4">uh</h3><div class="card__todo-title">13:29:46</div></div><div class="todo-description">hu</div><div class="card_bottom"><div class="user"><img class="card__todo-author" src="https://avatars.dicebear.com/api/bottts/4.svg"><p class="todo__user-name">Chelsey Dietrich</p></div><div class="card__todo-btns"><a class="card__todo-edit"><i class="edit icon" data-type="edit-card"></i></a><a class="card__todo-delete"><i class="trash alternate icon" data-type="delete-one"></i></a></div></div></div>

                <div
                class="dashboard__cards-todo"
                id="todoCase"
                data-column-id="1"
              ></div>
              <button class="btn__dashboard btn__add" id="btn-add" data-list-id="">
                <i class="plus icon"></i>Add task
              </button>
                <hr>
                <button class="btn__dashboard btn__delete">Delete all</button>
            </div>
          </div>



            <div class="swiper-slide">
                <div class="dashboard dashboard__toDo">
                    <div class="dashboard__content">
                        <h2 class="title1 dashboard__title">To Do</h2>
                    </div>

                    <div class="card__todo" data-trello-id="1685100915511" id="todo-id"><div class="card_top"><h3 class="card__todo-title title4">uh</h3><div class="card__todo-title">13:29:46</div></div><div class="todo-description">hu</div><div class="card_bottom"><div class="user"><img class="card__todo-author" src="https://avatars.dicebear.com/api/bottts/4.svg"><p class="todo__user-name">Chelsey Dietrich</p></div><div class="card__todo-btns"><a class="card__todo-edit"><i class="edit icon" data-type="edit-card"></i></a><a class="card__todo-delete"><i class="trash alternate icon" data-type="delete-one"></i></a></div></div></div>



                    <div
                        class="dashboard__cards-todo"
                        id="todoCase"
                        data-column-id="1"
                    ></div>
                    <button class="btn__dashboard btn__add" id="btn-add">
                        <i class="plus icon"></i>Add task
                    </button>
                    <hr>
                    <button class="btn__dashboard btn__delete">Delete all</button>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="dashboard dashboard__toDo">
                    <div class="dashboard__content">
                        <h2 class="title1 dashboard__title">To Do</h2>
                    </div>

                    <div class="card__todo" data-trello-id="1685100915511" id="todo-id"><div class="card_top"><h3 class="card__todo-title title4">uh</h3><div class="card__todo-title">13:29:46</div></div><div class="todo-description">hu</div><div class="card_bottom"><div class="user"><img class="card__todo-author" src="https://avatars.dicebear.com/api/bottts/4.svg"><p class="todo__user-name">Chelsey Dietrich</p></div><div class="card__todo-btns"><a class="card__todo-edit"><i class="edit icon" data-type="edit-card"></i></a><a class="card__todo-delete"><i class="trash alternate icon" data-type="delete-one"></i></a></div></div></div>



                    <div
                        class="dashboard__cards-todo"
                        id="todoCase"
                        data-column-id="1"
                    ></div>
                    <button class="btn__dashboard btn__add" id="btn-add">
                        <i class="plus icon"></i>Add task
                    </button>
                    <hr>
                    <button class="btn__dashboard btn__delete">Delete all</button>
                </div>
            </div><div class="swiper-slide">
                <div class="dashboard dashboard__toDo">
                    <div class="dashboard__content">
                        <h2 class="title1 dashboard__title">To Do</h2>
                    </div>

                    <div class="card__todo" data-trello-id="1685100915511" id="todo-id"><div class="card_top"><h3 class="card__todo-title title4">uh</h3><div class="card__todo-title">13:29:46</div></div><div class="todo-description">hu</div><div class="card_bottom"><div class="user"><img class="card__todo-author" src="https://avatars.dicebear.com/api/bottts/4.svg"><p class="todo__user-name">Chelsey Dietrich</p></div><div class="card__todo-btns"><a class="card__todo-edit"><i class="edit icon" data-type="edit-card"></i></a><a class="card__todo-delete"><i class="trash alternate icon" data-type="delete-one"></i></a></div></div></div>



                    <div
                        class="dashboard__cards-todo"
                        id="todoCase"
                        data-column-id="1"
                    ></div>
                    <button class="btn__dashboard btn__add" id="btn-add">
                        <i class="plus icon"></i>Add task
                    </button>
                    <hr>
                    <button class="btn__dashboard btn__delete">Delete all</button>
                </div>
            </div>



        </div>
      </div>
    </section>
    <div class="ui modal pop-up pop-up__delete-all">
      <div class="container__pop-up">
        <div class="pop-up__image-wrap">
          <img
            src="./images/remove.png"
            alt="remove-icon"
            class="pop-up__image"
          />
        </div>
        <div class="pop-up__text-wrap">
          <h1 class="title1">Are you sure?</h1>
          <h2 class="title2">
            Do you really want to delete these records? This process cannot be
            undone.
          </h2>
        </div>
        <div class="actions pop-up__buttons-wrap">
          <button class="negative ui btn btn--light">Cancel</button>
          <button class="positive ui btn btn--dark">Delete</button>
        </div>
      </div>
    </div>
    <div class="ui modal pop-up__inprogress pop-up margin-remove">
      <div class="container__pop-up">
        <div class="image content">
          <div class="ui medium image pop-up__image-wrap">
            <img
              src="./images/remove.png"
              alt="remove-icon"
              class="pop-up__image"
            />
          </div>
        </div>
        <div class="description">
          <div class="ui header pop-up__text-wrap">
            <h1 class="title1">Are you sure?</h1>
            <h2 class="title2">
              You added more than 6 tasks into «In Progress» column.
            </h2>
          </div>
        </div>
        <div class="actions pop-up__buttons-wrap">
          <button
            class="positive ui button btn-inprogress--dark"
            id="confirm-move"
          >
            Confirm
          </button>
        </div>
      </div>
    </div>
    <div class="ui modal add__todo" id="modal_edit">
      <div class="gradient-line"></div>
      <div class="header">Edit Mrello Card</div>
      <div class="content">
        <form class="ui form" id="form-edit">
          <div class="required field">
            <input
              type="text"
              name="title"
              placeholder="Title"
              id="title-edit"
            />
          </div>
          <div class="required field">
            <textarea
              class="input-description"
              rows="5"
              name="description"
              placeholder="Description"
              id="desc-edit"
            ></textarea>
          </div>
        </form>
      </div>
      <div class="actions">
        <div
          class="edit ui fluid selection dropdown user-select"
          id="dropdown-edit"
        >
          <input type="hidden" name="user" />
          <i class="dropdown icon"></i>
          <div class="default text">Select Friend</div>
          <div class="menu" id="menu-edit"></div>
        </div>
        <div class="button-agreement">
          <div class="ui cancel button">Cancel</div>
          <div class="positive ui approve button" id="editBtn">Edit</div>
        </div>
      </div>
    </div>
    <div class="ui modal add__todo" id="modal_add">
      <div class="gradient-line"></div>
      <div class="header">Create Mrello Card</div>
      <div class="content">
        <form class="ui form add" id="form-add">
          <div class="field">
            <input type="text" name="title" placeholder="Title" class="input-title" id="inputTitle" required/>
          </div>
          <div class="field">
            <textarea class="input-description" rows="5" name="description" placeholder="Description" id="inputDescription" required></textarea>
          </div>
        </form>
      </div>
      <div class="actions">
        <div
          class="add ui fluid selection dropdown user-select required field"
          id="selection"
        >
          <input type="hidden" name="user" />
          <i class="dropdown icon"></i>
          <div class="default text">Select User</div>
          <div class="menu" id="menu"></div>
        </div>
        <div class="button-agreement">
          <div class="ui cancel button">Cancel</div>
          <div class="positive ok ui approve button" id="approveBtn" type="button">Confirm</div>
        </div>
      </div>
    </div>

<script>



    $(document).ready(function (){

        $("#approveBtn").click(function (){

            var form = document.getElementById("form-add")
            var formData = new FormData(form);

            var listId = $('#btn-add').data('list-id');

            formData.append('listId', listId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url        : "{{url('task/create')}}",
                type       : "POST",
                data       : formData,
                cache      : false,
                processData: false,
                contentType: false,

                success:function (data){

                    alert("OK");
                }

            })


        })
    })



</script>
