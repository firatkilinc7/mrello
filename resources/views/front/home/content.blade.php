<section class="section-dashboard">
      <div class="wrapper__dashboard swiper" id="root">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="dashboard dashboard__toDo">
              <div class="dashboard__content">
                <h2 class="title1 dashboard__title">To Do</h2>
              </div>
              <div
                class="dashboard__cards-todo"
                id="todoCase"
                data-column-id="1"
              ></div>
              <button class="btn__dashboard btn__add" id="btn-add" onclick="addTask()">
                <i class="plus icon"></i>Add task
              </button>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="dashboard dashboard__inProgress">
              <div class="dashboard__content">
                <h2 class="title1 dashboard__title">In Progress</h2>
              </div>
              <div class="dashboard__cards-inProgress" data-column-id="2"></div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="dashboard dashboard__done">
              <div class="dashboard__content">
                <h2 class="title1 dashboard__title">Done</h2>
              </div>
              <div class="dashboard__cards-done" data-column-id="3"></div>
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
            <input
              type="text"
              name="title"
              placeholder="Title"
              class="input-title"
              id="inputTitle"
              required
            />
          </div>
          <div class="field">
            <textarea
              class="input-description"
              rows="5"
              name="description"
              placeholder="Description"
              id="inputDescription"
              required
            ></textarea>
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
          <div class="positive ok ui approve button" id="approveBtn">
            Confirm
          </div>
        </div>
      </div>
    </div>

<script>

    function addTask() {
        const todo = new TodoConstructor(
            inputTitle.value,
            document.getElementById("inputDescription").value,
            imgAvatar,
            todoUser,
            todoId,
            column
        );
    }



</script>
