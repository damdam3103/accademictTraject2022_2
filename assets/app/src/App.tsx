import React, {Fragment} from "react";
import NavBar from "./components/NavBar";
import {Routes, Route} from 'react-router-dom';
import Home from "./components/Home";
import Posts from "./components/Posts";

function App() {
  return (
      <Fragment>
          <NavBar />
          <Routes>
              <Route path="/" element={<Home />} />
              <Route path="/posts" element={<Posts />} />
              <Route path="/create" element={<Home />} />
          </Routes>
      </Fragment>
  );
}

export default App;
