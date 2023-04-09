import React from "react";
import { useState } from "react";
export default function ProductList(){
    const [isCheckboxactive, SetIsCheckboxactive] = useState({});
    const [Cards, SetCard] = useState({});
    const cardsdata = [
        { id: 1, sku: "ABC123", name: "Product 1", price: 9.99, attribute: "Dimensions:" },
        { id: 2, sku: "DEF456", name: "Product 2", price: 19.99, attribute: "Size:" },
        { id: 3, sku: "GHI789", name: "Product 3", price: 29.99, attribute: "Weight:" },
      ];

    function handleCardClick(cardId, ev) {
        SetIsCheckboxactive((prevState) => ({
          ...prevState,
          [cardId]: !prevState[cardId],
        }));
        ev.currentTarget.querySelector('.cardcheckbox').checked = !isCheckboxactive[cardId];
      }

return <div className='w-100 d-flex flex-row flex-wrap justify-content-start' >
    {cardsdata.map((card)=>(

<div  className='card text-white border border-dark position-relative' style={{width: 12 + "rem", marginLeft: 1.5 + "rem"}}>
<div  className= {`card-body d-flex flex-column align-items-center  ${isCheckboxactive[card.id] ? "delete-checkbox" : ""} `} onClick={(ev) => handleCardClick(card.id, ev)} >
<input className="form-check-input position-absolute align-self-start cardcheckbox opacity-100" type="checkbox" value="" disabled></input>
    <p className="card-text text-black">SKU: {card.sku}</p>
    <p className="card-text text-black">NAME: {card.name}.</p>
    <p className="card-text text-black">PRICE IN $: {card.price}.</p>
    <p className="card-text text-black">{card.attribute}</p>
</div>
</div>



))}


</div> 

};