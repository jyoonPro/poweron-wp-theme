# 파워온 WP 테마 개발 가이드

작성자: 윤석상
수정일: 2021.07.12 (Rev. 1)



### 0. 개발 환경 세팅

- Node v14 LTS
  - 주의: Node v15 이상은 호환되지 않음.
  - Node 설치: https://nodejs.org/ko/ 참고, macOS 또는 Linux의 경우 패키지 매니저(homebrew, apt 등)를 통해 nvm을 다운로드 받고 `nvm install 14` 를 통해 설치 권장



### 1. 디렉토리 구조

```
.
+-- poweron_html (CSS 및 JS 개발, 레이아웃 실험은 여기에서)
|   +-- _sass (SCSS 파일 여기에서 편집)
|   +-- _javascript (JS 파일 여기에서 편집)
|   +-- css (자동 생성, 건드리지 말 것)
|   +-- lib (자동 생성, 건드리지 말 것)
|   +-- img (스태틱 이미지 폴더)
|   +-- package.json
|   +-- .babelrc
|   +-- .nvmrc
|   +-- (html files) (레이아웃 테스트용)
+-- poweron (실제 WordPress 테마)
|   +-- css (poweron_html 폴더에서 생성된 css 폴더 여기에 복사)
|   +-- lib (poweron_html 폴더에서 생성된 lib 폴더 여기에 복사)
|   +-- img (스태틱 이미지 폴더)
|   +-- style.css (WordPress 설정창에 보이는 테마 정보)
|   +-- screenshot.png (WordPress 설정창에 보이는 테마 썸네일, 880x660)
|   +-- functions.php (테마 설정 파일)
|   +-- (other php files)
+-- export (Compress.app 에서 생성한 업로드용 테마 압축 파일)
+-- Compress.app (macOS에서 테마를 압축할 수 있는 자동화 프로그램)
+-- README.md
+-- LICENCE.md
+-- 파워온 보고서 작성법.pdf
+-- .gitignore
+-- .gitattributes
```



### 2. poweron_html 디렉토리에서 테마 스타일 및 레이아웃 개발하기

`poweron_html` 디렉토리에는 SCSS 파일 및 JS 파일, 그리고 대강 레이아웃을 볼 수 있는 html 파일들이 제공된다. 여기에 있는 html 파일은 실제 테마에는 전혀 반영이 되지 않기 때문에 자유롭게 변형해도 무관하다.

`css` 폴더와 `lib` 폴더는 자동 생성되는 폴더이므로, 이를 추후에 `poweron` 디렉토리로 복사 및 붙여넣기를 하면 된다.



##### 0. 처음 다운로드 받은 후 실행

`poweron_html` 디렉토리에서 `npm i` 를 실행하여 필요한 node 모듈을 다운받는다.



##### 1. SCSS/JS 파일을 편집할 때 항상 실행

`poweron_html` 디렉토리에서 `npm start` 를 실행하면 된다. `_sass`, `_javascript` 폴더 속의 파일들이 수정되면 즉시 컴파일하여 `css` 와 `lib` 폴더를 생성해준다. 

명령어 실행 후 창을 닫으면 안된다.



##### 2. Sass 사용하기

https://sass-lang.com/ 를 참고하여 Sass의 기초를 익혀두면 좋다.
또한, Sass는 기본적으로 CSS와 100% 호환되므로 잘 모르겠다면 CSS를 그대로 가져다 사용하면 된다.

이 테마는 bulma에서 제공되는 SCSS 파일, 그리고 파워온 고유의 커스터마이징을 main.css 하나로 합치는 것이 목표이다. 따라서 기본적으로는 `_sass` 폴더 속에 `main.scss` 파일 하나만 있으며, 이 파일 내부에서 다른 SCSS 파일들을 import하고 있다.

import의 순서는 굉장히 중요하다. 나중에 import된 것이 기존 스타일에 디펜던시가 있고, 또 값을 덮어쓰는 경우가 있기 때문이다. 따라서 `main.scss` 파일에서 다음의 순서를 반드시 지키며 개발하기를 권장한다. 아래의 2번과 4번 영역에서 개발하면 큰 문제는 없을 것이다.

```scss
@charset "utf-8";

// 1. 기본 변수 및 함수 import하기
@import "../node_modules/bulma/sass/utilities/initial-variables";
@import "../node_modules/bulma/sass/utilities/functions";

// 2. 폰트 또는 나만의 변수 여기에서 선언하기

// 3. 디펜던시가 있는 변수 및 mixin import하기
@import "../node_modules/bulma/sass/utilities/derived-variables";
@import "../node_modules/bulma/sass/utilities/mixins";

// 4. 커스텀 스타일 여기에서 정의하기

// 5. bulma의 전체 스타일 가장 마지막에 import하기
@import "../node_modules/bulma/bulma";
```

참고로, 개발을 반드시 `main.scss` 파일 하나에서 할 필요는 없다. 여러 파일에 분할하여 개발하되, 4번 영역의 마지막 줄에 적절히 import해주면 된다.



##### 3. 나머지

`_javascrip` 폴더 속에는 `main.js` 파일이 있다. 여기에 네비게이션 바 기능과 같이 원하는 자바스크립트 코드를 추가하면 된다. 이 또한 `lib` 폴더로 자동 컴파일된다.

`img` 폴더 속에는 테스트용 이미지들을 넣을 수 있다. 최종본에서 이 이미지들을 그대로 사용해도 되지만, 이미지를 자주 바꿀 계획이라면 WordPress의 이미지 업로드 기능을 사용하는 것을 더 권장한다.



### 3. poweron 디렉토리로 테마 옮기기

WordPress는 기본적으로 php를 사용한다. 따라서 테마 또한 php 언어로 개발해야 한다.



##### 0. 테마 테스트하는 방법

Php 파일은 브라우저로 바로 볼 수 없기 때문에 테스트하기 어렵다. 따라서 2번 단계에서 충분히 레이아웃을 테스트하고 php로 옮기는 것을 추천한다. 파워온 사이트에 테마를 바로 올려 테스트할 수도 있지만, https://localwp.com/ 과 같은 프로그램을 사용하여 로컬 환경에 WordPress를 설치하여 테스트해볼 수도 있다. 다만 WordPress 설정을 파워온과 동일하기 적용해야 한다.



##### 1. 중요한 파일들

- style.css
  - 이 파일에 테마 이름, 저자, 설명, 버전 등을 입력할 수 있다. 새로운 테마를 업로드할 때마다 버전 번호를 업데이트하는 것을 까먹지 말자.
- screenshot.png
  - 관리자 페이지에서 보이는 테마 썸네일 사진이다. 해상도는 880px x 660px로 설정해주면 된다.
- functions.php
  - 테마에서 가장 중요한 파일이다. 테마의 기능을 설정하고, 렌더링 방법을 변형하거나 CSS/JS와 같은 스크립트를 등록할 수 있다.
- header.php/footer.php
  - 공통된 헤더와 푸터를 따로 모듈화한 파일이다. 헤더에는 네비게이션 바도 포함되어 있다.
  - `<?php get_header();?>`, `<?php get_footer();?>` 를 사용하여 불러올 수 있다.
- index.php/page.php 등
  - 아무런 설정이 없을 때 표시되는 기본 페이지이다. 파워온 웹사이트는 기본 페이지를 따로 설정하였기 때문에 이 템플릿이 적용되지는 않는다.
- front-page.php
  - 파워온 웹사이트의 홈페이지에 나타나는 템플릿이다.
- template-*.php
  - 페이지 또는 포스트 작성 시 적용할 수 있는 템플릿 파일이다. 템플릿 파일은 첫 줄에 템플릿 이름 등을 선언해주어야 WordPress에서 인식할 수 있다.
- 기타 기능은 https://developer.WordPress.org/ 등을 참고하자.



##### 2. ACF (Advanced Custom Fields) 플러그인

https://www.advancedcustomfields.com/resources/

ACF 플러그인을 사용하면 페이지 또는 포스트 편집 시 하나의 텍스트 에디터만 있는 것이 아니라 여러 항목이 나타나도록 할 수 있다. 사용자가 입력한 값들을 실제로 나타내기 위해서는 php 파일에서 관련 변수들을 불러와서 사용해야 한다.

위의 도큐멘테이션을 읽어보면 사용법을 쉽게 숙지할 수 있다. 유투브에 찾아보는 것 또한 추천한다. 또한, 현재 템플릿 파일들은 대부분 ACF를 활용하고 있으므로, 이 파일들을 레퍼런스로 사용해도 무방하다.

파워온은 윤석상 소유의 ACF Pro 라이센스를 사용하고 있다. 라이센스 관련 문의는 윤석상에게 하기를 바란다.



##### 3. HTML을 테마로 옮기는 기초적인 과정

마음에 드는 HTML 레이아웃을 정했다면, 이제 php 파일로 옮겨야 한다. 보통은 `template-*.php` 파일을 만들어 워드프레스 페이지 또는 포스트에서 이 템플릿을 활성화하는 것이 일반적이다.

헤더, 푸터의 경우 이미 따로 모듈화되어있기 때문에 옮기지 않아도 된다. 헤더, 푸터가 각각 어디에서 끊어지는지 확인하려면 `header.php`, `footer.php`를 자세히 살펴보기를 바란다.

템플릿 파일의 형태는 기본적으로 다음과 같다.

```php+HTML
<?php
    /* Template Name: <name>
     * Template Post Type: post */ <-- 포스트에서 템플릿을 사용하고 싶으면 이 줄을 추가해주자.
    get_header();
    /* 같은 ACF 변수를 반복적으로 사용할 경우 미리 가져오기 */
?>

<!-- HTML 내용 -->

만약 ACF이나 워드프레스 계정 권한 등에 따라 바뀌는 내용이 있다면, HTML 중간에 PHP 코드를 삽입해주면 된다.
ex) <?php the_title(); ?> <?php echo $proj_auth['name']; ?>
WordPress 제공 함수 중 the_ 로 시작하는 함수들은 보통 echo가 내장되어 있다. 만약 실제 화면에서 원하는 값이 보이지 않는다면 echo를 사용하여 그 값을 출력하도록 해주면 된다.

<?php get_footer();?>
```



### 4. 업로드를 위해 테마 준비하기

`css`, `lib` 폴더를 복사하였고`style.css` 에서 버전은 변경하였으면, `poweron` 폴더를 압축하여 업로드용 테마를 준비하자. 압축파일은 poweron_x_x.zip (ex. poweron_1_0.zip ) 형식처럼 버전 번호를 포함하되 스페이스가 및 특수기호가 되도록 없도록 해주면 좋다. 점 또는 스페이스를 사용할 경우 워드프레스에서 업로드 및 활성화 자체는 정상적으로 작동하지만, 테마 삭제가 제대로 되지 않는다.

`Compress.app` 은 macOS에서 `poweron` 폴더를 압축하고 suffix를 붙이기 쉽도록 만든 Automation이다. 만약 실행이 되지 않는다면 우클릭 실행을 누르면 된다. 결과는 export 폴더 속에 있다.



### 5. 테마 업로드하기

WordPress 관리자 페이지에서 외모 → 테마 → 새로운 테마 추가 → 테마 업로드 버튼을 사용하여 4단계에서 만들었던 압축 파일을 업로드해주면 된다. 업로드가 성공한 후 테마를 활성화시키면 적용된다.



### 6. 라이센스

LICENCE.md 파일 참조.