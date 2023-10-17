<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>UI</title>

  <link rel="stylesheet" href="../dist/css/style.css">
  <link rel="stylesheet" href="src/style-ui.css">
</head>
<body>

<div class="bd-layout">
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

      <div class="example">
        <h3>Article card</h3>
        <div class="card-wrapper col-12 col-md-6 col-lg-4">
          <article class="card article-card">
            <!--                TODO card full height if slide-->
            <a href="/news/article">
              <!--                  TODO test different image sizes-->
              <div class="card-img-box">
                <img class="card-img" src="/assets/img/demo/news-card-img.jpg"
                     alt="В РБК вышла полезная статья о Jump Taxi">
              </div>
            </a>

            <div class="card-body">
              <div class="article-date">
                <svg class="icon">
                  <use href="#icon-calendar"></use>
                </svg>
                12.12.2021
              </div>
              <a href="/news/article" class="link--title"><h5 class="card-title">В РБК вышла полезная статья о Jump
                  Taxi</h5></a>
              <p class="card-text">Воздали по услугам: как айтишники изменили рынок такси, выручив ₽140 млн. Два
                айтишника завели таксопарк…</p>
              <a href="/news/article" class="card-link link link--underline">
                Читать полностью
                <svg class="icon icon--arrow" style="margin-left: 8px;">
                  <use href="#icon-arrow-right"></use>
                </svg>
              </a>
            </div>
            <div class="card-badge article-card__badge article-card__badge--news">
              Новость
            </div>
          </article>
        </div>
      </div>

      <div class="example">
        <h3>Solution card</h3>
        <div style="max-width: 390px;">
          <div class="card solutions-card">
            <img src="assets/img/demo/solution-card-1.jpg" class="card-img" alt="Таксопарки">
            <div class="card-img-overlay">
              <div class="card-body">
                <h5 class="card-title">Таксопарки</h5>
                <p class="card-text">Моментальные выплаты, подбор водителей под ваши требования, управление
                  маршрутами, использование брендированного приложения, наличие всех агрегаторов в одном месте.</p>
                <!--                  TODO: hover all card or link only-->
                <a href="#" class="btn btn--circle">
                    <span class="btn__inner">
                      <svg class="icon icon--arrow">
                        <use href="#icon-arrow-right"/>
                      </svg>
                      <span class="btn__text">Подробнее</span>
                    </span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="example">
        <h3>Solution Features card</h3>
        <div class="" style="max-width: 400px;">
          <div class="features-card card card--no-shadow">
            <div class="card-body card-body--center">
              <div class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 60" class="icon">
                  <path class="bottom-layer"
                        d="M32.38 54.687c14.37 0 26.02-11.65 26.02-26.02S46.75 2.647 32.38 2.647c-14.371 0-26.02 11.65-26.02 26.02s11.649 26.02 26.02 26.02z"
                        fill="#FFDD2D" stroke="#111" stroke-width="2" stroke-miterlimit="10"></path>
                  <path
                    d="M28.094 58.973c14.37 0 26.02-11.65 26.02-26.02 0-14.371-11.65-26.02-26.02-26.02s-26.02 11.649-26.02 26.02c0 14.37 11.65 26.02 26.02 26.02z"
                    fill="#05F"></path>
                  <path d="M41.666 22.008l-1.699-1.7-11.915 11.914-7.234-5.826-1.618 1.78 8.935 7.363 13.531-13.532z"
                        fill="#fff"></path>
                  <path d="M29.073 53.147h-1.958v4.192h1.958v-4.192z" fill="#fff"></path>
                  <path d="M29.072 8.566h-1.958v4.192h1.957V8.566z" fill="#fff"></path>
                  <path d="M7.9 31.975H3.708v1.957H7.9v-1.957z" fill="#fff"></path>
                  <path d="M52.48 31.974H48.29v1.957h4.191v-1.957z" fill="#fff"></path>
                </svg>
              </div>
              <div class="card-title">Выплаты 24/7</div>
              <p class="card-text">Автоматическая проверка платежных документов, благонадежности плательщиков и
                заказчиков, перевод в
                считанные минуты в любое время суток.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="example">
        <h3>Solution Features icons</h3>
        <style>
          p .icon {
            height: 60px;
            width: 60px;
          }
        </style>
        <div style="display:flex; gap: 1rem;">
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/act.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/adaptiv.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/api.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/chat.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/display.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/document_2.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/document_3.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/law.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/limit.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/limit_2.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/nalog.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/oferta.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/pen.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/portfolio.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/security.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/setting.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/shield.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/status.svg'; ?></p>
          <p
            style="height: 100px; width: 100px; "><?php include DIR_BASE . 'assets/icons/features-icons/time.svg'; ?></p>
        </div>
      </div>

      <div class="example">
        <h3>Press card</h3>
        <div class="" style="max-width: 400px;">
          <article class="card press-card">
            <div class="card-body">
              <!--                  TODO press source logo link?-->
              <div class="press-card-logo">
                <img src="/assets/img/demo/press-logo-rbk.jpg" alt="RBK" class="card-image">
              </div>
              <a href="#" class="link--title">
                <h5 class="card-title">Воздали по услугам: как айтишники изменили рынок такси, выручив ₽140 млн</h5>
              </a>
              <p class="card-text">Два айтишника завели таксопарк, в котором водители могли получить заработанное
                сразу, а не через
                неделю. Идея оказалась продуктивной не только для таксистов, но и для всех самозанятых.</p>
            </div>
          </article>
        </div>
      </div>
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

    <div class="component-block">
      <h3 class="component-block__title">Pagination</h3>
      <div class="example">
        <nav class="d-flex justify-content-center" aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item disabled">
              <a class="page-link" href="#" aria-label="Previous">
                <svg class="icon" style="transform: rotate(180deg);">
                  <use href="#icon-arrow-right"/>
                </svg>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <svg class="icon">
                  <use href="#icon-arrow-right"/>
                </svg>
              </a>
            </li>
          </ul>
        </nav>
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


</body>
</html>
