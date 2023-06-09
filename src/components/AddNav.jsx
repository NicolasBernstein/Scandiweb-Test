import { useNavigate } from "react-router-dom";
import { BrowserRouter, Routes, Route, Link } from 'react-router-dom';
export default function Addform() {
  const navigate = useNavigate();

  const handleReturnClick = () => {
    navigate('/');
  };

  return (

    <nav className="navbar navbar-expand -lg navbar-black bg-white d-flex justify-content-between border-bottom">
      <p className="h1">Product Add </p>
      <div className='navbar-nav ms-auto' style={{ marginRight: 2 + 'em', paddingLeft: 5 + "rem" }}>
        <button form='product_form' type="submit" className='nav-link text-light text-black border border-dark' style={{ marginRight: 1 + 'em' }} >Save</button>
        <button className='nav-link text-light text-black border border-dark' onClick={handleReturnClick}>Cancel</button>
      </div>
    </nav>
  );
}