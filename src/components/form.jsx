import { useState } from "react"
import axios from "axios";
import { useNavigate } from "react-router-dom";
export default function Form() {
  const [Productype, setProductType] = useState('DVD')
  const [sku, Setsku] = useState('');
  const [name, Setname] = useState('');
  const [price, Setprice] = useState('');
  const [attributetype, Setattributetype] = useState('Size');
  var Size;
  var Weight;
  var Height;
  var Width;
  var Length;
  const [format, Setformat] = useState('MB');
  const navigate = useNavigate();

  function changediv(value) {
    document.querySelector("#sizediv").style = "display: none;";
    document.querySelector("#weightdiv").style = "display: none;";
    document.querySelector("#dimensions").style = "display: none";
    if (value == "DVD") {
      document.querySelector("#sizediv").style = "display: block;";
      Setattributetype('Size');
      Setformat('MB');
    } else if (value == "BOOK") {
      document.querySelector("#weightdiv").style = "display: block;";
      Setattributetype('Weight');
      Setformat('KG');

    }
    else if (value == "FURNITURE") {
      document.querySelector("#dimensions").style = "display: block";
      Setattributetype('HxWxL');
      Setformat('');
    }

  }



  function validate() {
    var values = document.querySelectorAll(".value");
    for (var i = 0; i < values.length; i++) {
      if (values[i].value.length <= 0 && values[i].parentNode.parentNode.parentNode.style.display != "none") {
        return values[i].name;
      }
    }
    return null;
  }



  function submit() {
    var value = validate();
    var errordiv = document.querySelector(".errormsg");
    if (value != null) {
      errordiv.style.display = "block";
      errordiv.innerHTML = "Please, submit required data in " + value;
      return;
    }
    errordiv.style.display = "none";
    var formdata = {
      "datatype": 'POST',
      "sku": sku,
      "name": name,
      "price": price,
      "type": Productype,
      "size": Size,
      "Weight": Weight,
      "Height": Height,
      "Width": Width,
      "Length": Length
    }
    if (Productype == "FURNITURE") {
      const height = document.querySelector("#height").value;
      const width = document.querySelector("#width").value;
      const length = document.querySelector("#length").value;
      Height = height;
      Width = width;
      Length = length;
      Size = '';
      Weight = '';
    } else if (Productype == "BOOK") {
      var element = document.querySelector("#weight").value;
      Weight = element;
      Size = ''
      Height = '';
      Width = '';
      Length = '';
    } else if (Productype == "DVD") {
      var element = document.querySelector("#size").value;
      Size = element;
      Weight = '';
      Height = '';
      Width = '';
      Length = '';
    }
    formdata.Height = Height;
    formdata.Width = Width;
    formdata.Length = Length;
    formdata.size = Size;
    formdata.Weight = Weight
    console.log(formdata);
    axios({
      method: 'post',
      url: 'http://localhost/scandiweb%20api/',
      data: new URLSearchParams(formdata),
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
    }).then(response => {
      console.log(response.data);

      navigate('/')
    })
      .catch(error => {
        console.log(error.response.data);
        errordiv.style.display = "block";
        errordiv.innerHTML = error.response.data;
      });
  }
  return (
    <form className="mt-4" id="product_form" onSubmit={ev => {
      ev.preventDefault();
      submit();
    }}>
      <div className="d-flex flex-row form-group ">
        <label className=" col-form-label labelpos" for='sku' >SKU</label>
        <div className="col-sm-9">
          <input type="text" name="Sku" id="sku" className="value" onChange={ev => Setsku(ev.target.value)}></input>
        </div>
      </div>
      <div className="d-flex flex-row form-group ">
        <label className="col-form-label labelpos" for='name'>Name</label>
        <div className="col-sm-9">
          <input type="text" name="name" id="name" className="value" onChange={ev => Setname(ev.target.value)} ></input>
        </div>
      </div>

      <div className="d-flex flex-row form-group ">
        <label className="col-form-label labelpos" for='Price'>Price ($)</label>
        <div className="col-sm-9">
          <input type="number" name="Price" id="price" className="value" onChange={ev => Setprice(ev.target.value)}></input>
        </div>
      </div>

      <div className="d-flex flex-row mt-3 mb-1 align-items-center">
        <label className="col-form-label labelpos" for='switch' >Product Type</label>
        <div className="col-sm-9">
          <select value={Productype} id="productType" name="switch" className="form- value" style={{ width: 12 + "rem" }} onChange={(event) => { setProductType(event.target.value); changediv(event.target.value); }}>
            <option value={"DVD"}>DVD</option>
            <option value={"BOOK"}>Book</option>
            <option value={"FURNITURE"}>Furniture</option>
          </select>
        </div>
      </div>

      <div id="sizediv" style={{ display: 'block' }} >
        <div className="d-flex flex-row form-group">
          <label className="col-form-label labelpos">Size (MB)</label>
          <div className="col-sm-9">
            <input type="number" name="Size" className="mt-2 value" id="size"></input>
          </div>
        </div>
      </div>

      <div id="weightdiv" style={{ display: 'none' }}>
        <div className="d-flex flex-row form-group"  >
          <label className="col-form-label labelpos">Weight (KG)</label>
          <div className="col-sm-9">
            <input type="number" name="Weight" className="mt-2 value" id="weight" ></input>
          </div>
        </div>
      </div>



      <div id="dimensions" style={{ display: 'none' }}>
        <div className="d-flex flex-row form-group">
          <label className="col-form-label labelpos" >Height:</label>
          <div className="col-sm-9">
            <input type="number" name="Height" className="mt-2 value" id="height" ></input>
          </div>


        </div>

        <div className="d-flex flex-row form-group">
          <label className="col-form-label labelpos" >Width:</label>
          <div className="col-sm-9">
            <input type="number" name="Width" className="mt-2 value" id="width"></input>
          </div>


        </div>


        <div className="d-flex flex-row form-group">
          <label className="col-form-label labelpos">Length:</label>
          <div className="col-sm-9">
            <input type="number" name="Length" className="mt-2 value" id="length"></input>
          </div>


        </div>
      </div>

      <div className="h6 errormsg" ></div>


    </form>
  )
}