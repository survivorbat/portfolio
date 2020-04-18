import React from 'react';
import Particles from 'react-particles-js';
import './App.scss';
import {Header} from "./header/Header";
import {NavBar} from "./navbar/NavBar";

function App() {
  return (
    <div className="container">
        <Header/>
        <NavBar/>

        <Particles/>
    </div>
  );
}

export default App;
