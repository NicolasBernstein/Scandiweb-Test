
import logo from './logo.svg';
import './App.css';
import Productlist from './components/ProductList';
import Addform from './components/AddNav';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Navbar from './components/Navbar';
import Form from './components/Form'; 
import Footer from './components/Footer';
import { useState } from 'react';
function App() {

  return (
    <BrowserRouter>
      <Navbar />
      <Routes>
        <Route exact path="/" element={<Productlist />} />
        <Route path="/addproduct" element={<> <Addform /> <Form/> </>} />
      </Routes>
      <Footer/>
    </BrowserRouter>
  );
}

export default App;
