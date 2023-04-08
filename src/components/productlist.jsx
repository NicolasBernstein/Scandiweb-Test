import {BrowserRouter, Routes, Route, Link} from 'react-router-dom';
import Addform  from './AddNav';
export default function productlist(){
    function validate(){

    }
return <div className='w-100 d-flex flex-row flex-wrap justify-content-start' >
<div className='card text-white border border-dark position-relative' style={{width: 12 + "rem"}}>
<div className='card-body d-flex flex-column align-items-center' onClick={validate} >
<input className="form-check-input position-absolute align-self-start cardcheckbox" type="checkbox" value="" id="flexCheckDefault" disabled></input>
    <p class="card-text text-black">SKU.</p>
    <p class="card-text text-black">NAME.</p>
    <p class="card-text text-black">PRICE IN $.</p>
    <p class="card-text text-black">ATTRIBUTE.</p>
</div>
</div>





</div> 

};