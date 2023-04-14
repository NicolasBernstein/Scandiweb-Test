import React from "react";
import { useState } from "react";
import { useEffect } from "react";
import axios from "axios";
export default function ProductList(){
    const [isCheckboxactive, SetIsCheckboxactive] = useState({});
    const [cardsdata, setCardsdata] = useState([]);

    function handleCardClick(cardId, ev) {
        SetIsCheckboxactive((prevState) => ({
          ...prevState,
          [cardId]: !prevState[cardId],
        }));
        ev.currentTarget.querySelector('.cardcheckbox').checked = !isCheckboxactive[cardId];
      }
      useEffect(() => {
        function loadData() {
          axios({
            method: 'get',
            url: 'http://localhost/scandiweb%20api/',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
          })
          .then(response => {
            setCardsdata(response.data);
            console.log(response.data);
          })    
          .catch(error => {
            console.log(error);
          });
        }
        loadData();
      }, []);
return <div className='w-100 d-flex flex-row flex-wrap justify-content-start' >
    {cardsdata.map((card)=>(

<div key={card.id}  className='card text-white border border-dark position-relative' style={{width: 12 + "rem", marginLeft: 1.5 + "rem"}}>
<div  className= {`card-body d-flex flex-column align-items-center  ${isCheckboxactive[card.id] ? "delete-checkbox" : ""} `} onClick={(ev) => handleCardClick(card.id, ev)} >
<input className="form-check-input position-absolute align-self-start cardcheckbox opacity-100" type="checkbox" value="" disabled></input>
    <p className="card-text text-black text-center productext" style={{whiteSpace: "nowrap", width: 75 + "%", fontSize: 90 + "%"}}>{card.sku}</p>
    <p className="card-text text-black productext">{card.name}</p>
    <p className="card-text text-black productext">{card.price} $</p>
    <p className="card-text text-black productext">{card.productype.toUpperCase()}: {card.attribute}MB</p>
</div>
</div>



))} 


</div> 

};