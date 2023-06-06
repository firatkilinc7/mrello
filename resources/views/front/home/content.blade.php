<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>


<section class="section-dashboard">
    <button class="btn__dashboard" id="btn-add-list" onclick="addList({{$usersPano->id}})" style="background-color: #393e46">
        <i class="plus icon"></i>Add List
    </button>
    <div class="wrapper__dashboard swiper" id="root">
        <div class="swiper-wrapper">
            @foreach($lists as $list)

                <div class="swiper-slide" data-list-id="{{$list->id}}">
                    <div class="dashboard dashboard__toDo">
                        <div class="dashboard__content">
                            <h2 class="title1 dashboard__title"  >{{$list->name}}</h2>
                            <div class="card__todo-btns">
                                <a class="list__todo-edit" onclick="editList({{$list->id}})" data-list-id="{{$list->id}}">
                                    <i class="edit icon" data-type="edit-list"></i>
                                </a>

                            </div>
                        </div>

                        @foreach($list->getTasks as $task)

                            <div class="card__todo" id="todo-id" data-task-id = "{{$task->id}}">
                                <div class="card_top">
                                    <h3 class="card__todo-title title4">{{$task->title}}</h3>
                                    <div class="card__todo-title">{{ $task->created_at == null ? "No Date" : ( ((time()-strtotime($task->created_at))/86400) >= 1 ? date("d/m/Y", strtotime($task->created_at)) : "Bugün, ".date("H:i", strtotime($task->created_at)))}}</div>
                                </div>
                                <div class="todo-description">{{$task->content}}</div>
                                <div class="card_bottom">
                                    <div class="user">
                                        <img class="card__todo-author" src="https://avatars.dicebear.com/api/bottts/4.svg">
                                        <p class="todo__user-name">{{$task->getCreatedBy->fullname}}</p>
                                    </div>
                                    <div class="card__todo-btns">
                                        <a class="card__todo-edit" onclick="editTask({{$task->id}})" data-task-id="{{$task->id}}">
                                            <i class="edit icon" data-type="edit-card"></i>
                                        </a>
                                        <a class="card__todo-delete" onclick="deleteTask({{$task->id}})" data-task-id="{{$task->id}}">
                                            <i class="trash alternate icon" data-type="delete-one"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div
                            class="dashboard__cards-todo"
                            id="todoCase"
                            data-column-id="1"
                            data-list-id ="{{$list->id}}"
                        ></div>
                        <button class="btn__dashboard btn__add" onclick="createTask({{$list->id}})" id="btn-add" data-list-id="{{$list->id}}">
                            <i class="plus icon"></i>Add Task
                        </button>
                        <hr>
                        <button class="btn__dashboard btn__delete" onclick="deleteAllTasks({{$list->id}})" data-list-id = "{{$list->id}}">Delete All</button>
                        <hr>
                        <button class="btn__dashboard btn__delete-list" onclick="deleteList({{$list->id}})" style="background-color: #393e46">Delete List</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<div class="ui modal pop-up pop-up__delete-all">
    <div class="container__pop-up">
        <div class="pop-up__image-wrap">
            <img
                src="https://i1.wp.com/ankararesimkursu.net/wp-content/uploads/2021/07/IMG_1464-scaled.jpg"
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
            <button class="positive ui btn btn--dark" id="delete-all">Delete</button>
        </div>
    </div>
</div>

<div class="ui modal pop-up pop-up__delete-list">
    <div class="container__pop-up">
        <div class="pop-up__image-wrap">
            <img
                src="https://i1.wp.com/ankararesimkursu.net/wp-content/uploads/2021/07/IMG_1464-scaled.jpg"
                alt="remove-icon"
                class="pop-up__image"
            />
        </div>
        <div class="pop-up__text-wrap">
            <h1 class="title1">Listleri silmek istiyor musunuz?</h1>
            <h2 class="title2">Bu işlem geri alınamaz.</h2>
        </div>
        <div class="actions pop-up__buttons-wrap">
            <button class="negative ui btn btn--light">Cancel</button>
            <button class="positive ui btn btn--dark" id="delete-list">Delete</button>
        </div>
    </div>
</div>

<div class="ui modal pop-up__inprogress pop-up margin-remove">
    <div class="container__pop-up">
        <div class="image content">
            <div class="ui medium image pop-up__image-wrap">
                <img
                    src="https://i1.wp.com/ankararesimkursu.net/wp-content/uploads/2021/07/IMG_1464-scaled.jpg"
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

<div class="ui modal add__todo" id="modal-add-list">
    <div class="gradient-line"></div>
    <div class="header">Create List</div>
    <div class="content">
        <form class="ui form" id="form-add-list">
            <div class="field">
                <input type="text" name="title" placeholder="Title" class="input-title" id="listTitle" required/>
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="button-agreement">
            <div class="ui cancel button">Cancel</div>
            <div class="positive ok ui approve button" id="approveAddList" type="button">Confirm</div>
        </div>
    </div>
</div>



<div class="ui modal add__todo" id="modal_editList">
    <div class="gradient-line"></div>
    <div class="header">Edit list</div>
    <div class="content">
        <form class="ui form" id="list-edit">
            <div class="required field">
                <input
                    type="text"
                    name="title"
                    placeholder="Title"
                    id="ListTitle-edit"
                />
            </div>
        </form>
    </div>
    <div class="actions">
        <div class="button-agreement">
            <div class="ui cancel button">Cancel</div>
            <div class="positive ui approve button" id="ListeditBtn">Edit</div>
        </div>
    </div>
</div>

<script>

    //TASK EKLEME KISMI

    var listId

    function createTask(id){
        listId = id;
    }

    $(document).ready(function (){


        $("#approveBtn").click(function (){

            var form = document.getElementById("form-add")
            var formData = new FormData(form);


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
                    //TODO: KULLANICI ISLEMLERI TAMAMLANDIKTAN SONRA PROFIL FOTO VE EKLEYEN KISININ ADI BASILACAK


                    var dateText;
                    var createdAtDate = data["created_at"]*1000;
                    var currentDate = new Date().getTime();

                    if(createdAtDate === null){
                        dateText = "No Date";
                    }else{
                        if ((currentDate - createdAtDate) >= 24 * 60 * 60 * 1000) { // 1 günü milisaniye cinsinden hesaplayın
                            var createdDate = new Date(createdAtDate);
                            dateText = String(createdDate.getDate()).padStart(2, '0') + "/" + String(createdDate.getMonth() + 1).padStart(2, '0') + "/" + createdDate.getFullYear();
                        } else {
                            dateText = "Bugün, " + new Date(createdAtDate).toLocaleTimeString("tr-TR", {
                                hour: "2-digit",
                                minute: "2-digit"
                            });
                        }
                    }

                    const cardTodoColumn = document.querySelector(`.dashboard__cards-todo[data-list-id="${data["listId"]}"]`);
                    var html = `
                                <div class="card__todo" id="todo-id" data-task-id="${data["taskId"]}">
                                    <div class="card_top">
                                        <h3 class="card__todo-title title4">${data["title"]}</h3>
                                        <div class="card__todo-title">${dateText}</div>
                                    </div>
                                    <div class="todo-description">${data["description"]}</div>
                                    <div class="card_bottom">
                                        <div class="user">
                                            <img class="card__todo-author" src="https://avatars.dicebear.com/api/bottts/4.svg">
                                            <p class="todo__user-name">${data["created_by"]}</p>
                                        </div>
                                        <div class="card__todo-btns">
                                            <a class="card__todo-edit" onclick="editTask(${data["taskId"]})" data-task-id="${data["taskId"]}">
                                                <i class="edit icon" data-type="edit-card"></i>
                                            </a>
                                            <a class="card__todo-delete" onclick="deleteTask(${data["taskId"]})" data-task-id="${data["taskId"]}">
                                                <i class="trash alternate icon" data-type="delete-one"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                `;
                    $(cardTodoColumn).append(html);
                    addEditBtnEventListener();
                }
            })
        })
    })


    //TASK SILME KISMI

    function deleteTask(taskId){
        $(document).ready(function (){

            var formData = new FormData();
            formData.append("taskId", taskId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url        : "{{url('task/delete')}}",
                type       : "POST",
                data       : formData,
                cache      : false,
                processData: false,
                contentType: false,

                success:function (data){
                    const currentTrello = document.querySelector(`.card__todo[data-task-id="${data["taskId"]}"]`);
                    console.log(currentTrello);
                    const parentElement = currentTrello.parentNode;
                    parentElement.removeChild(currentTrello);
                }
            })

        });
    }


    //TASK GUNCELLEME KISMI

        var taskId;

        function editTask(id){
            taskId = id;
        }

        $("#editBtn").click(function (){

            var form = document.getElementById("form-edit")
            var formData = new FormData(form);

            formData.append('taskId', taskId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url        : "{{url('task/update')}}",
                type       : "POST",
                data       : formData,
                cache      : false,
                processData: false,
                contentType: false,

            success:function (data){
                //TODO: KULLANICI ISLEMLERINDEN SONRA PROFIL FOTO VE FULLNAME DUZENLENECEK

                const editedTask = document.querySelector(`.card__todo[data-task-id="${data["taskId"]}"]`);
                editedTask.querySelector(".card__todo-title").textContent = data["title"];
                editedTask.querySelector(".todo-description").textContent = data["description"];
                //editedTask.querySelector(".todo__user-name").textContent = data["username"];
                //editedTask.querySelector(".todo__user-name").setAttribute("src", data["img_url"]);
            }
        })
    });


    //LIST ICINI KOMPLE SILME


    var listIdforDelete;

    function deleteAllTasks(id){
        listIdforDelete = id;
    }

    $(document).ready(function (){


        $("#delete-all").click(function (){
            var formData = new FormData();
            formData.append('listId', listIdforDelete);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url        : "{{url('task/delete-all')}}",
                type       : "POST",
                data       : formData,
                cache      : false,
                processData: false,
                contentType: false,

                success:function (data){

                    for (var i = 0; i < data.length; i++) {
                        const currentTrello = document.querySelector(`.card__todo[data-task-id="${data[i]}"]`);
                        const parentElement = currentTrello.parentNode;
                        parentElement.removeChild(currentTrello);
                    }
                }
            })
        })
    });

    //list oluşturma
    var panoId;

    function addList(id){
        panoId = id;
    }


    $(document).ready(function (){


        $("#approveAddList").click(function (){

            var form = document.getElementById("form-add-list")
            var formData = new FormData(form);

            formData.append('panoId', panoId);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url        : "{{url('list/create')}}",
                type       : "POST",
                data       : formData,
                cache      : false,
                processData: false,
                contentType: false,

                success:function (data){

                    const swiperWrapper = document.querySelector(`.swiper-wrapper`);
                    var htmls = `
                <div class="swiper-slide" data-list-id = "${data["id"]}">
                    <div class="dashboard dashboard__toDo">
                      <div class="dashboard__content">
                        <h2 class="title1 dashboard__title">${data["title"]}</h2>
                            <div class="card__todo-btns">
                              <a class="list__todo-edit" onclick="editList(${data["id"]})" data-list-id="${data["id"]}">
                                  <i class="edit icon" data-type="edit-list"></i>
                              </a>

                          </div>
                      </div>


                    <div
                        class="dashboard__cards-todo"
                        id="todoCase"
                        data-column-id="1"
                        data-list-id ="${data["id"]}">
                    </div>
                          <button class="btn__dashboard btn__add" onclick="createTask(${data["id"]})" id="btn-add" data-list-id="${data["id"]}">
                            <i class="plus icon"></i>Add Task
                          </button>
                            <hr>
                            <button class="btn__dashboard btn__delete" onclick="deleteAllTasks(${data["id"]})" data-list-id = "${data["id"]}">Delete All</button>
                            <hr>
                            <button class="btn__dashboard btn__delete-list" onclick="deleteList(${data["id"]})" style="background-color: #393e46">Delete List</button>
                        </div>
                      </div>
                                    `;
                    $(swiperWrapper).append(htmls);
                    addAddButtonEventListener();
                    addDeleteBtnEventListener();
                    addDeleteListEventListener();
                    addEditBtnsEventListener();
                }
            })
        });
    });

    function deleteList(id){

        $("#delete-list").click(function (){
            var formData = new FormData();
            formData.append('listId', id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url        : "{{url('list/delete')}}",
                type       : "POST",
                data       : formData,
                cache      : false,
                processData: false,
                contentType: false,

                success:function (data){

                    const currentList = document.querySelector(`.swiper-slide[data-list-id="${data["id"]}"]`);
                    const listParent = currentList.parentNode;
                    listParent.removeChild(currentList);
                }
            })
        })
    }

    //list  güncelleme

    var listidupdate;

    function editList(id){
        listidupdate = id ;

    }

    $("#ListeditBtn").click(function (){

        var form = document.getElementById("list-edit")
        var formData = new FormData(form);

        formData.append('id', listidupdate);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $.ajax({
            url        : "{{url('list/update')}}",
            type       : "POST",
            data       : formData,
            cache      : false,
            processData: false,
            contentType: false,

            success:function (data){


                const editedList = document.querySelector(`.swiper-slide[data-list-id="${data["id"]}"]`);
                editedList.querySelector(".dashboard__title").textContent = data["title"];

            }
        })
    });

</script>
