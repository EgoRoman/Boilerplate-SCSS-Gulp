<style>
  .bd-layout {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
  }

  @media (min-width: 992px) {
    .bd-layout {
      display: grid;
      grid-template-areas: "sidebar main";
      grid-template-columns: 1fr 5fr;
      gap: 1.5rem;
    }
  }

  .bd-sidebar {
    grid-area: sidebar;
    /*flex: 0 0 300px;*/
    /*padding: 30px 15px;*/
  }

  @media (min-width: 992px) {
    .bd-sidebar {
      position: sticky;
      top: 2rem;
      /*display: block !important;*/
      width: 300px;
      height: calc(100vh - 3rem);
      /*padding-left: 0.25rem;*/
      /*margin-left: -0.25rem;*/
      border-right: 1px solid #EAECF0;
      overflow-y: auto;
    }
  }

  .bd-main {
    grid-area: main;
    min-height: calc(100vh - 100px);
    padding: 30px 15px;
    /*TODO temp*/
    overflow: hidden;
  }

  @media (min-width: 992px) {
    .bd-main {

    }
  }

  .example {
    display: flex;
    align-items: center;
    gap: .5rem;
    margin-bottom: 2rem;
    padding: 1rem;
    border-radius: 3px;
    box-shadow: 0 0.5rem 2rem -0.25rem hsla(216, 9%, 44%, .1);
  }

  h2 {
    font-size: 1.5rem;
  }

  h3 {
    font-size: 1.1rem;
  }
</style>

<div class="content-wrapper">
  <!-- Page container -->
  <div class="container pt-4">
    <div class="row pt-sm-2">

      <!-- Sidebar navigation -->
      <aside class="col-lg-3 pe-xl-4">
        <div class="cd-sidebar">
          <div id="sidebarNav" class="offcanvas-lg offcanvas-start d-flex flex-column h-100" tabindex="-1"
               aria-labelledby="sidebarNavLabel">
            <div class="offcanvas-header py-3">
              <h5 class="offcanvas-title" id="sidebarNavLabel">Browse docs</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarNav"
                      aria-label="Close"></button>
            </div>

            <div class="offcanvas-body d-block flex-grow-1 overflow-hidden pt-0 pe-0 pb-lg-2">
              <div id="scrollable" class="h-100 overflow-y-auto pe-4">
                <nav class="docs-list list-group list-group-borderless" onclick="closeSidebar()">

                  <!--Components-->
                  <div class="">
                    <h4 class="">
                      Components
                    </h4>
                    <a href="#buttonsBlock"
                       class="list-group-item list-group-item-action justify-content-between">
                      Buttons
                      <span class="visually-hidden">navigation links</span>
                    </a>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </aside>

      <!-- Page content -->
      <main class="col-lg-9 pt-1 pb-5 mb-sm-2 mb-md-3">

        <!--Components-->
        <?php require_once 'components/breadcrumb.php' ?>
        <?php require_once 'components/buttons.php' ?>

      </main>
    </div>
  </div>
</div>

<!--TODO-->
<div class="bd-layout" style="display: none;">
  <aside class="bd-sidebar">
    <div style="position: sticky; top: 0; padding-top: 20px;padding-bottom: 20px;">
      <h2>Table of contents</h2>
      <ul></ul>
    </div>
  </aside>

  <main class="bd-main">

    <h1>Content</h1>
    <h2>Typography</h2>
    <div class="component-block">
      <h3 class="component-block__title">Headings</h3>
      <div class="example">
        <?php require 'components/headings.php'; ?>
      </div>
    </div>

    <h1>Components</h1>

    <h2>Buttons</h2>
    <div class="component-block">
      <h3 class="component-block__title">_</h3>
      <div class="example">
        <?php require 'components/buttons.php'; ?>
      </div>
    </div>

    <!--FORMS-->
    <h2>Forms</h2>
    <div class="component-block">
      <h3 class="component-block__title">Checkbox</h3>
      <div class="example">
        <?php require 'components/forms/checkbox.php'; ?>
      </div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Radio</h3>
      <div class="example">
        <?php require 'components/forms/radio.php'; ?>
      </div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Floating labels</h3>
      <div class="example">
        <?php require 'components/forms/floating-labels.php'; ?>
      </div>
    </div>
    <!--END FORMS-->

    <h2>Pagination</h2>
    <div class="component-block">
      <h3 class="component-block__title">Pagination</h3>
      <div class="example">
        <?php require 'components/pagination.php'; ?>
      </div>
    </div>


    <div class="component-block">
      <h3 class="component-block__title">Accordion</h3>
      <div class="example">
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <p class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                      aria-expanded="true" aria-controls="collapseOne">
                Обязательна ли распечатка чеков?
                <svg class="icon">
                  <use href="#icon-plus"/>
                </svg>
              </button>
            </p>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                 data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>В договоре должны быть прописаны сроки предоставления чеков. Возможны два варианта: передача сразу
                  после оплаты либо ежемесячно, но не позднее 9-го числа следующего месяца.</p>
                <p>Передача чека – это обязанность налогоплательщика НПД. Если исполнитель игнорирует этот факт, то
                  организация может сообщить о нарушениях в налоговый орган. Если он этого не сделает, то не сможет
                  вычесть расходы на оплату из налоговой базы. Самозанятому грозит штраф, если он получил оплату, но
                  не
                  выбил чек. Размер штрафа – 20% от суммы оплаты. Если в течение 6 месяцев произойдет повторный
                  инцидент, штраф составит 100% о суммы чека.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <p class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse2"
                      aria-expanded="false" aria-controls="collapse2">
                Срок передачи чека и ответственность за его не-передачу
                <svg class="icon">
                  <use href="#icon-plus"/>
                </svg>
              </button>
            </p>
            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                 data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>В договоре должны быть прописаны сроки предоставления чеков. Возможны два варианта: передача сразу
                  после оплаты либо ежемесячно, но не позднее 9-го числа следующего месяца.</p>
                <p>Передача чека – это обязанность налогоплательщика НПД. Если исполнитель игнорирует этот факт, то
                  организация может сообщить о нарушениях в налоговый орган. Если он этого не сделает, то не сможет
                  вычесть расходы на оплату из налоговой базы. Самозанятому грозит штраф, если он получил оплату, но
                  не
                  выбил чек. Размер штрафа – 20% от суммы оплаты. Если в течение 6 месяцев произойдет повторный
                  инцидент, штраф составит 100% о суммы чека.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <p class="accordion-header" id="heading3ne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse3ne"
                      aria-expanded="false" aria-controls="collapse3ne">
                Возврат оплаты и аннулирование чека исполнителем.
                <svg class="icon">
                  <use href="#icon-plus"/>
                </svg>
              </button>
            </p>
            <div id="collapse3ne" class="accordion-collapse collapse" aria-labelledby="heading3"
                 data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>В договоре должны быть прописаны сроки предоставления чеков. Возможны два варианта: передача сразу
                  после оплаты либо ежемесячно, но не позднее 9-го числа следующего месяца.</p>
                <p>Передача чека – это обязанность налогоплательщика НПД. Если исполнитель игнорирует этот факт, то
                  организация может сообщить о нарушениях в налоговый орган. Если он этого не сделает, то не сможет
                  вычесть расходы на оплату из налоговой базы. Самозанятому грозит штраф, если он получил оплату, но
                  не
                  выбил чек. Размер штрафа – 20% от суммы оплаты. Если в течение 6 месяцев произойдет повторный
                  инцидент, штраф составит 100% о суммы чека.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <p class="accordion-header" id="heading4">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapse4"
                      aria-expanded="false" aria-controls="collapse4">
                Можно ли чеки заменить актами?
                <svg class="icon">
                  <use href="#icon-plus"/>
                </svg>
              </button>
            </p>
            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4"
                 data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <p>В договоре должны быть прописаны сроки предоставления чеков. Возможны два варианта: передача сразу
                  после оплаты либо ежемесячно, но не позднее 9-го числа следующего месяца.</p>
                <p>Передача чека – это обязанность налогоплательщика НПД. Если исполнитель игнорирует этот факт, то
                  организация может сообщить о нарушениях в налоговый орган. Если он этого не сделает, то не сможет
                  вычесть расходы на оплату из налоговой базы. Самозанятому грозит штраф, если он получил оплату, но
                  не
                  выбил чек. Размер штрафа – 20% от суммы оплаты. Если в течение 6 месяцев произойдет повторный
                  инцидент, штраф составит 100% о суммы чека.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Breadcrumb</h3>
      <div class="example">
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#" class="breadcrumb-link">Главная</a>
            </li>
            <li class="breadcrumb-item">
              <a href="#" class="breadcrumb-link">Новости</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Новости Статья</li>
          </ul>
        </nav>
      </div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Buttons</h3>
      <div class="example">
        <button type="button" class="btn btn--primary">
          <span class="btn__inner">Primary</span>
        </button>
        <button type="button" class="btn btn--primary-white">Primary White</button>
        <button type="button" class="btn btn--secondary">Secondary</button>
        <button class="btn btn--outline btn--back">
          <svg class="icon" style="margin-right: 10px;">
            <use href="#icon-arrow-left"/>
          </svg>
          Outline button
        </button>
      </div>

      <div class="example">
        <a href="#" class="btn btn--circle">
                    <span class="btn__inner">
                      <svg class="icon icon--arrow">
                        <use href="#icon-arrow-right"/>
                      </svg>
                      <span class="btn__text">Circle</span>
                    </span>
        </a>
      </div>

      <h3>Sizes</h3>
      <div class="example">
        <button type="button" class="btn btn--primary btn--lg">
          <span class="btn__inner">Large button</span>
        </button>
        <button type="button" class="btn btn--primary btn--md">
          <span class="btn__inner">Medium button</span>
        </button>
        <button type="button" class="btn btn--primary">
          <span class="btn__inner">Normal button</span>
        </button>
      </div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Cards</h3>
      <div class="example"></div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Form</h3>
      <div class="example">
        <div class="form-group col-12 col-xl-6">
          <label for="floatingInput">Ваше имя</label>
          <input type="name" class="form-control" id="floatingInput" placeholder="Ivan Ivanov">
        </div>
      </div>

      <h3>Floating label</h3>
      <div class="example">
        <div class="form-group col-12 col-xl-6">
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Ваш e-mail</label>
          </div>
        </div>
      </div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Icons</h3>
      <div class="example">
        <ul>
          <li>
            <svg class="icon">
              <use href="#icon-icon-support"/>
            </svg>
          </li>
        </ul>
      </div>
    </div>

    <div class="component-block">
      <h3 class="component-block__title">Nav</h3>
      <div class="example">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
          </li>
        </ul>
      </div>

      <h3>Underline</h3>
      <div class="example">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link nav-link--underline active" aria-current="page" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link--underline" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link--underline" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link--underline disabled">Disabled</a>
          </li>
        </ul>
      </div>

      <h3>Dropdown</h3>
      <div class="example">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link nav-link--underline active" aria-current="page" href="#">Active</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link nav-link--underline" href="#">Dropdown link</a>
            <div class="dropdown-menu">
              <ul class="nav nav--vertical">
                <li class="nav-item"><a href="#" class="nav-link">О компании</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Продукты</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Решения</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Техподдержка</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link--underline" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link--underline disabled">Disabled</a>
          </li>
        </ul>
      </div>

      <h3>Vertical</h3>
      <div class="example">
        <ul class="nav nav--vertical">
          <li class="nav-item"><a href="#" class="nav-link">О компании</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Продукты</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Решения</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Техподдержка</a></li>
        </ul>
      </div>
    </div>
  </main>
</div>

<script>
  const titles = document.querySelectorAll('.component-block__title');
  const tocNav = document.querySelector('aside ul');

  titles.forEach(el => {
    const name = el.textContent;
    el.id = name.toLowerCase();

    tocNav.insertAdjacentHTML("beforeend", `<li><a href="#${name.toLowerCase()}">${name}</a></li>`);
  })
</script>
