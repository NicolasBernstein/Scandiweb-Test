
import logo from './logo.svg';
import './App.css';
import Productlist from './components/productlist';
import Addform from './components/AddNav';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Navbar from './components/navbar';
import Form from './components/form'; 
import Footer from './components/footer';
function App() {
  return (
    <BrowserRouter>
      <Navbar />
      <Routes>
        <Route exact path="/" element={<Productlist />} />
        <Route path="/addproduct" element={<> <Addform /> <Form/> </>} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
