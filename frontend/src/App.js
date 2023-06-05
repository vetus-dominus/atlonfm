import logo from './logo.svg';
import './App.css';

function App() {
  return (
    <div className="App">
      <div class="sh-container sh-padding-remove">
        <div class="sh-card sh-card-body sh-card-primary">
            <span data-sh-icon="icon: atlon-logo; ratio: 2.5"></span>
        </div>
      </div>
      <div class="sh-container sh-margin-top">
        <div class="sh-flex sh-flex-column">
          <div class="sh-text-center sh-card sh-card-default sh-card-body">
            <h3>Комнаты</h3>
            {/* image from https://nagornydom.ru/catalog/turn_6/floor_229/flat_1295/ */}
            <a href="/rooms.html">
              <img class="sh-animation-stroke" width="200" src="/static/images/rooms.svg" alt="" />
            </a>
          </div>
          <div class="sh-text-center sh-card sh-card-default sh-card-body sh-margin-top">
            <h3>Работы</h3>
            {/* image from http://akbars-eng.ru/construction/ */}
            <a href="/constructions.html">
              <img class="sh-animation-stroke" width="200" src="/static/images/develop.svg" alt="" />
            </a>
          </div>
        </div>
      </div>
    </div>
  );
}

export default App;
