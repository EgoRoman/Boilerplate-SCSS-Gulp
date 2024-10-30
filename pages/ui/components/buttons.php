<!-- Page title -->
<section class="py-2 pb-sm-3" id="buttonsBlock">
  <h1 class="pt-1">Buttons</h1>
</section>

<section id="buttons" class="cd-section pb-sm-2 mb-5">
  <h3>Common buttons</h3>
  <div class="example">
    <button class="btn btn-primary rounded" type="button">Primary</button>
    <button class="btn btn-outline-secondary rounded" type="button">Outline Light</button>
    <button class="btn btn-outline-dark" type="button">Outline Dark</button>
  </div>

  <!--  Sizes-->
  <h3>Sizes</h3>
  <div class="example">
    <button class="btn btn-primary btn-lg rounded" type="button">Large button</button>
    <button class="btn btn-primary rounded" type="button">Normal button</button>
  </div>

  <!--Static icons-->
  <h3>Static icons</h3>
  <div class="example">
    <button class="btn btn-primary rounded" type="button">
      <i class="icon fs-lg me-4">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#cart"></use>
        </svg>
      </i>
      В корзину
    </button>
    <button class="btn btn-outline-secondary rounded" type="button">
      Показать еще
      <i class="icon fs-xl ms-4">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#repeat"></use>
        </svg>
      </i>
    </button>

    <button class="btn btn-primary rounded" type="button">
      <i class="icon fs-lg">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#cart"></use>
        </svg>
      </i>
    </button>

    <div class="d-flex bg-black p-2 gap-2">
      <button class="btn btn-light btn-icon rounded rounded-circle" type="button">
        <i class="icon fs-xl">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#search"></use>
          </svg>
        </i>
      </button>
      <button class="btn btn-light btn-icon rounded rounded-circle" type="button">
        <i class="icon fs-xl">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#user"></use>
          </svg>
        </i>
      </button>
      <button class="btn btn-light btn-icon rounded rounded-circle" type="button">
        <i class="icon fs-xl">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#heart"></use>
          </svg>
        </i>
      </button>
      <button class="btn btn-light btn-icon rounded rounded-circle" type="button">
        <i class="icon fs-xl">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#cart"></use>
          </svg>
        </i>
      </button>
    </div>
  </div>
  <div class="example">
    <button class="btn btn-primary btn-lg rounded" type="button">
      <i class="icon fs-lg me-4">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#cart"></use>
        </svg>
      </i>
      В корзину
    </button>
    <button class="btn btn-outline-secondary btn-lg rounded" type="button">
      Показать еще
      <i class="icon fs-2xl ms-4">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#repeat"></use>
        </svg>
      </i>
    </button>

    <!--Slider buttons-->
    <!--TODO animation-->
    <button class="btn btn-outline-secondary btn-lg btn-prev rounded px-4" type="button">
      <i class="icon fs-xl">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#arrow-left"></use>
        </svg>
      </i>
    </button>
    <button class="btn btn-outline-secondary btn-lg btn-next rounded px-4" type="button">
      <i class="icon fs-xl">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#arrow-right"></use>
        </svg>
      </i>
    </button>

    <div class="d-inline-flex bg-black p-2 gap-2">
      <!--Slider buttons Variant 2-->
      <button class="btn btn-outline-light btn-lg btn-prev rounded px-4" type="button">
        <i class="icon fs-xl">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#arrow-left"></use>
          </svg>
        </i>
      </button>
      <button class="btn btn-outline-light btn-lg btn-next rounded px-4" type="button">
        <i class="icon fs-xl">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#arrow-right"></use>
          </svg>
        </i>
      </button>
    </div>
  </div>

  <!--Animated icons-->
  <h3>Animated icons</h3>
  <div class="example">
    <button class="btn btn-primary rounded animate-scale" type="button">
      <i class="icon fs-lg me-4 animate-target">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#cart"></use>
        </svg>
      </i>
      В корзину
    </button>
    <button class="btn btn-outline-secondary rounded animate-rotate" type="button">
      Показать еще
      <i class="icon fs-xl ms-4 animate-target">
        <svg>
          <use xlink:href="<?= SVG_SPRITE_SRC ?>#repeat"></use>
        </svg>
      </i>
    </button>

    <div class="d-flex bg-black p-2 gap-2">
      <button class="btn btn-light btn-icon rounded rounded-circle animate-scale" type="button">
        <i class="icon fs-xl animate-target">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#search"></use>
          </svg>
        </i>
      </button>
      <button class="btn btn-light btn-icon rounded rounded-circle animate-shake" type="button">
        <i class="icon fs-xl animate-target">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#user"></use>
          </svg>
        </i>
      </button>
      <button class="btn btn-light btn-icon rounded rounded-circle animate-pulse" type="button">
        <i class="icon fs-xl animate-target">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#heart"></use>
          </svg>
        </i>
      </button>
      <button class="btn btn-light btn-icon rounded rounded-circle animate-scale" type="button">
        <i class="icon fs-xl animate-target">
          <svg>
            <use xlink:href="<?= SVG_SPRITE_SRC ?>#cart"></use>
          </svg>
        </i>
      </button>
    </div>
  </div>
</section>
