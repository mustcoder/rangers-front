import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import AppComponent from './App';
import reportWebVitals from './reportWebVitals';

ReactDOM.render(
  <React.StrictMode>
    <AppComponent name={'Elman'} age={45} />
  </React.StrictMode>,
  document.getElementById('app')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
