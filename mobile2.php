<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Untitled HTML5 Document</title>
<style>
/* general styles */

body {
  font-family: 'Helvetica Neue',Arial,Helvetica,sans-serif;
}

.wrapper {
  padding: 1rem;
}

/* column styles */

.column__list {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  grid-gap: .5rem;
  align-items: start;
  /* uncomment these lines if you want to have the standard Trello behavior instead of the column wrapping */
  /*   grid-auto-flow: column;
    grid-auto-columns: minmax(260px, 1fr); */
}

.column__item {
  border-radius: .2rem;
  background-color: #dfe3e6;
  padding: .5rem;
}

.column__title--wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  padding: .25rem;
  align-items: center;
}

.column__title--wrapper h2 {
  color: #17394d;
  font-weight: 700;
  font-size: .9rem;
}

.column__title--wrapper i {
  text-align: right;
  color: #798d99;
}

.column__item--cta {
  padding: .25rem;
  display: flex;
  color: #798d99;
}

.column__item--cta i {
  margin-right: .25rem;
}

/* card styles */

.card__list {
  display: grid;
  grid-template-rows: auto;
  grid-gap: .5rem;
  margin: .5rem 0;
}

.card__item {
  background-color: white;
  border-radius: .25rem;
  box-shadow: 0 1px 0 rgba(9,45,66,.25);
  padding: .5rem;
}

.card__tag {
  font-size: .75rem;
  padding: .1rem .5rem;
  border-radius: .25rem;
  font-weight: 700;
  color: white;
  margin-bottom: .75rem;
  display: inline-block;
}

.card__image {
  width: 100%;
  margin-bottom: .25rem;
}

/* sticker colors */

.card__tag--design {
  background-color: #61bd4f;
}

.card__tag--browser {
  background-color: #c377e0;
}

.card__tag--mobile {
  background-color: #f2d600;
}

.card__tag--high {
  background-color: #eb5a46;
}

.card__tag--low {
  background-color: #00c2e0;
}

.card__title {
  color: #17394d;
  margin-bottom: .75rem;
}

/* card actions */

.card__actions {
  display: flex;
  align-items: center;
}

.card__actions--wrapper i {
  color: #798d99;
  margin-right: .5rem;
}

.card__actions--text {
  color: #798d99;
  font-size: .8rem;
  margin-left: -.25rem;
  margin-right: .5rem;
}

.card__avatars {
  display: flex;
  flex: 1;
  justify-content: flex-end;
}

.card__avatars--item {
  margin-left: .25rem;
  width: 28px;
  height: 28px;
}

.avatar__image {
  border-radius: 50%;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
</head>
<body>

<section class="wrapper">
  <ul class="column__list">
    <li class="column__item">
      <div class="column__title--wrapper">
        <h2>Incoming Bugs</h2>
        <i class="fas fa-ellipsis-h"></i>
      </div>
      <ul class="card__list">
        <li class="card__item">
          <span class="card__tag card__tag--browser">Browser</span>
          <h6 class="card__title">Lightbox loading issue on Safari</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          </ol>
        </li>
    <li class="card__item">
          <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">Notifications Not Sending #4</h6>
        </li>
    <li class="card__item">
          <span class="card__tag card__tag--browser">Browser</span>
          <h6 class="card__title">Multiple Select Broken</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          </ol>
        </li>
<li class="card__item">
          <span class="card__tag card__tag--browser">Browser</span>
          <h6 class="card__title">Drag and drop issues in Chrome</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          </ol>
        </li>
<li class="card__item">
          <span class="card__tag card__tag--design">Design</span>
  <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">Download icon rendering issue</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          </ol>
        </li>
<li class="card__item">
          <span class="card__tag card__tag--browser">Browser</span>
  <span class="card__tag card__tag--low">Low Priority</span>
          <h6 class="card__title">Tab to comment goes to wrong field</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          </ol>
        </li>
<li class="card__item">
  <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">Video load issues on IE 11</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          </ol>
        </li>
      </ul>
      <div class="column__item--cta">
        <i class="fas fa-plus"></i>
        <h4>Add another card</h4>
      </div>
    </li>
<li class="column__item">
      <div class="column__title--wrapper">
        <h2>In Progress</h2>
        <i class="fas fa-ellipsis-h"></i>
      </div>
      <ul class="card__list">
        <li class="card__item">
          <span class="card__tag card__tag--high">High Priotity</span>
          <h6 class="card__title">Localization</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="far fa-check-square"></i><span class="card__actions--text">1/4</span></li>
              <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
        <li class="card__item">
          <img src="https://trello-attachments.s3.amazonaws.com/5501f5265b23195e950742e9/300x300/5a2bf59113b7211315c399c8b9814e9d/Thumbs_Up_Icons.jpg" class="card__image">
          <span class="card__tag card__tag--design">Design</span>
          <h6 class="card__title">"Like" button in comments</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-paperclip"></i><span class="card__actions--text">1</span></li>
              <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Toa Heftiba on Unsplash -->
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman standing near blue steel gate" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
        <li class="card__item">
          <h6 class="card__title">Operation: All The Bugs</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
              <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
        <li class="card__item">
  <span class="card__tag card__tag--low">Low Priority</span>
          <h6 class="card__title">Make JSON Pretty</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Toa Heftiba on Unsplash -->
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman standing near blue steel gate" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
      </ul>
      <div class="column__item--cta">
        <i class="fas fa-plus"></i>
        <h4>Add another card</h4>
      </div>
    </li>
<li class="column__item">
      <div class="column__title--wrapper">
        <h2>QA</h2>
        <i class="fas fa-ellipsis-h"></i>
      </div>
      <ul class="card__list">
        <li class="card__item">
          <span class="card__tag card__tag--browser">Browser</span>
          <h6 class="card__title">Embed all the things</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i></li>
          <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
    <li class="card__item">
      <span class="card__tag card__tag--mobile">Mobile</span>
          <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">Pop-over max width issue on mobile</h6>
      <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-align-left"></i>
              <i class="far fa-comment"></i><span class="card__actions--text">1</span></li>
              <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Toa Heftiba on Unsplash -->
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman standing near blue steel gate" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
    <li class="card__item">
      <span class="card__tag card__tag--mobile">Mobile</span>
          <span class="card__tag card__tag--browser">Browser</span>
          <h6 class="card__title">Animated gif support</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="fas fa-paperclip"></i><span class="card__actions--text">1</span></li>
            <ol class="card__avatars">
                <li class="card__avatars--item">
              <!-- Photo by Toa Heftiba on Unsplash -->
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman standing near blue steel gate" class="avatar__image">
            </li>
              <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
      </ul>
      <div class="column__item--cta">
        <i class="fas fa-plus"></i>
        <h4>Add another card</h4>
      </div>
    </li>
<li class="column__item">
      <div class="column__title--wrapper">
        <h2>Ready For Launch</h2>
        <i class="fas fa-ellipsis-h"></i>
      </div>
      <ul class="card__list">
        <li class="card__item">
          <h6 class="card__title">Improved API documentation</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="far fa-comment"></i><span class="card__actions--text">1</span></li>
            <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Toa Heftiba on Unsplash -->
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman standing near blue steel gate" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
    <li class="card__item">
          <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">Slow log-in issue</h6>
      <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="far fa-comment"></i><span class="card__actions--text">1</span></li>
              <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
    <li class="card__item">
          <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">HTML 5 Support</h6>
          <ol class="card__actions">
            <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Toa Heftiba on Unsplash -->
              <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman standing near blue steel gate" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
<li class="card__item">
          <span class="card__tag card__tag--design">Design</span>
  <span class="card__tag card__tag--mobile">Mobile</span>
          <h6 class="card__title">iOS app redesign</h6>
          <ol class="card__actions">
            <li class="card__actions--wrapper">
              <i class="far fa-comment"></i><span class="card__actions--text">1</span></li>
            <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
      </ul>
      <div class="column__item--cta">
        <i class="fas fa-plus"></i>
        <h4>Add another card</h4>
      </div>
    </li>
<li class="column__item">
      <div class="column__title--wrapper">
        <h2>Live</h2>
        <i class="fas fa-ellipsis-h"></i>
      </div>
      <ul class="card__list">
        <li class="card__item">
          <span class="card__tag card__tag--design">Design</span>
          <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">Material Design for Android</h6>
          <ol class="card__actions">
            <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
    <li class="card__item">
      <img src="https://trello-attachments.s3.amazonaws.com/5501f41bc85bf1470c685b5c/300x246/f758c01c7295548771c91bd52ccd6779/Emoji_Icons.jpg" class="card__image">
          <span class="card__tag card__tag--mobile">Mobile</span>
      <span class="card__tag card__tag--browser">Broser</span>
          <h6 class="card__title">Emoji support</h6>
      <ol class="card__actions">
        <li class="card__actions--wrapper">
          <i class="far fa-comment"></i>
          <span class="card__actions--text">1</span>
          <i class="fas fa-paperclip"></i>
          <span class="card__actions--text">1</span>
        </li>
        <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
          </ol>
      </ol>
        </li>
    <li class="card__item">
      <span class="card__tag card__tag--design">Design</span>
          <span class="card__tag card__tag--browser">Browser</span>
          <h6 class="card__title">New icons for web</h6>
          <ol class="card__actions">
            <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
<li class="card__item">
          <span class="card__tag card__tag--high">High Priority</span>
          <h6 class="card__title">Pasting from clipboard</h6>
          <ol class="card__actions">
            <ol class="card__avatars">
            <li class="card__avatars--item">
              <!-- Photo by Philip Martin on Unsplash -->
              <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=664&q=80" alt="Man standing near balcony" class="avatar__image">
            </li>
                <li class="card__avatars--item">
              <!-- Photo by Michael Alfonso on Unsplash -->
              <img src="https://images.unsplash.com/photo-1516756587022-7891ad56a8cd?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Woman, Lady, Female" class="avatar__image">
            </li>
          </ol>
          </ol>
        </li>
      </ul>
      <div class="column__item--cta">
        <i class="fas fa-plus"></i>
        <h4>Add another card</h4>
      </div>
    </li>
  </ul>
</section>

</body>
</html>
