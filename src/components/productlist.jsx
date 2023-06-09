import React from "react";
import { useState } from "react";
import { useEffect } from "react";
import axios from "axios";
export default function ProductList() {
  const [isCheckboxActive, SetIsCheckboxActive] = useState({});
  const [cardsdata, setCardsdata] = useState([]);
  function handleCardClick(cardId, ev) {
    SetIsCheckboxActive((prevState) => ({
      ...prevState,
      [cardId]: !prevState[cardId],
    }));
    ev.currentTarget.querySelector('.cardcheckbox').checked = !isCheckboxActive[cardId];
    console.log(ev.currentTarget);
    console.log(ev.currentTarget.querySelector('input'));
    if (ev.currentTarget.querySelector('input').classList.contains('delete-checkbox')) {
      ev.currentTarget.querySelector('input').classList.add('delete');
      ev.currentTarget.querySelector('input').classList.remove('delete-checkbox');
    } else {
      ev.currentTarget.querySelector('input').classList.remove('delete');
      ev.currentTarget.querySelector('input').classList.add('delete-checkbox');
    }
  }
  useEffect(() => {
    function loadData() {
      axios({
        method: 'get',
        url: 'http://localhost/scandiweb%20api/',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
      })
        .then(response => {
          var data = response.data;
          for (var i = 0; i < response.data.length; i++) {
            if (data[i].type == 'DVD') {
              data[i].attribute = data[i].size;
              data[i].format = 'MB';
              data[i].attributetype = 'Size';
            }
            if (data[i].type == 'BOOK') {
              data[i].attribute = data[i].weight;
              data[i].format = 'KG';
              data[i].attributetype = 'Weight'
            }
            if (data[i].type == 'FURNITURE') {
              data[i].attribute = `${data[i].height}x${data[i].width}x${data[i].length}`;
              data[i].attributetype = 'Dimensions';
            }
          }

          setCardsdata(data);
        })
        .catch(error => {
          console.log(error);
        });
    }
    loadData();
  }, []);
  return <div className='w-100 d-flex flex-row flex-wrap justify-content-start' >
    {cardsdata.length > 0 && cardsdata.map((card) => (

      <div key={card.id} id={card.sku} className='card text-white border border-dark position-relative' style={{ width: 12 + "rem", marginLeft: 1.5 + "rem" }}>
        <div className={`card-body d-flex flex-column align-items-center`} onClick={(ev) => handleCardClick(card.id, ev)} >
          <input className={`form-check-input position-absolute align-self-start cardcheckbox opacity-100 delete-checkbox`} /*  ${isCheckboxActive[card.id] ? "delete" : "delete-checkbox"}*/ type="checkbox" value="" disabled></input>
          <p className="card-text text-black text-center productext" style={{ whiteSpace: "nowrap", width: 75 + "%", fontSize: 90 + "%" }}>{card.sku}</p>
          <p className="card-text text-black productext">{card.name}</p>
          <p className="card-text text-black productext">{card.price} $</p>
          <p className="card-text text-black productext">{card.attributetype}: {card.attribute} {card.format}</p>
        </div>
      </div>



    ))}


  </div>

};