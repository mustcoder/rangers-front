import { Component, Fragment } from 'react';
import logo from './logo.svg';
import './App.css';

export const AppComponent = (props) => {
//  const name = props.name + "-2"; const age = props.age + "-2";
 const { name, age } = props; 

  return (
    <>
    <h1> My name is {name} and my age is {age} </h1>
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
    </>
    
  );
}

// function App() {
//   return (
//   );
// }

export default AppComponent;
