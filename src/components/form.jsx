import { useState } from "react"
export default function Form(){
const [Productype, setProductType] = useState('1')
function changediv(value){
    document.querySelector("#sizediv").style = "display: none;";
    document.querySelector("#weightdiv").style = "display: none;";
    document.querySelector("#dimensions").style = "display: none";
  if(value == "DVD"){
    document.querySelector("#sizediv").style = "display: block;";
  }else if(value == "BOOK"){
    document.querySelector("#weightdiv").style = "display: block;";
  }
  else if(value == "FURNITURE"){
document.querySelector("#dimensions").style = "display: block";
  }

}
function submit(){
console.log("submitted");
}
    return(
        <form id="product_form" onSubmit={ev =>{
            ev.preventDefault();
            submit();
            }}>
            <div className="d-flex flex-row form-group "> 
            <label className=" col-form-label labelpos" for='sku' >SKU</label>
            <div className="col-sm-9">
            <input type="text" name="sku"    ></input>
            </div>
            </div>
                        <div className="d-flex flex-row form-group "> 
            <label className="col-form-label labelpos" for='name'>Name</label>
            <div className="col-sm-9">
            <input type="text" name="name"    ></input>
            </div>
            </div>

            <div className="d-flex flex-row form-group "> 
            <label className="col-form-label labelpos" for='price'>Price ($)</label>
            <div className="col-sm-9">
            <input type="number" name="price"></input>
            </div>
            </div>          

            <div className="d-flex flex-row mt-4">
            <label className="col-form-label labelpos" for='switch'>Product Type</label>
                <div className="col-sm-9">
                <select value={Productype} id="productType" name="switch" className="form-control" style={{width: 12 + "rem"}}  onChange={(event) => {setProductType(event.target.value); changediv(event.target.value);}}>
<option value={"DVD"}>DVD-disc</option>
<option value={"BOOK"}>Book</option>
<option value={"FURNITURE"}>Furniture</option>
                </select>
                </div>
            </div>
<div id="sizediv">
            <div className="d-flex flex-row form-group">
                <label className="col-form-label labelpos">Size (MB)</label>
                <div className="col-sm-9">
                <input type="number" className="mt-2" id="size"></input>
           </div>
            </div>
</div>

<div id="weightdiv" style={{display: 'none'}}>
            <div className="d-flex flex-row form-group"  >
                <label className="col-form-label labelpos">Weight (KG)</label>
                <div className="col-sm-9">
                <input type="number" className="mt-2" id="weight" ></input>
           </div>
            </div>
     </div>       



            <div id="dimensions" style={{display: 'none'}}>
            <div className="d-flex flex-row form-group">
            <label className="col-form-label labelpos" >Height:</label>
                <div className="col-sm-9">
                <input type="number" className="mt-2" id="height"></input>
           </div>
           
           
            </div>

            <div className="d-flex flex-row form-group">
                <label className="col-form-label labelpos" >Width:</label>
                <div className="col-sm-9">
                <input type="number" className="mt-2" id="width"></input>
           </div>
           
           
            </div>


            <div className="d-flex flex-row form-group">
            <label className="col-form-label labelpos">Length:</label>
                <div className="col-sm-9">
                <input type="number" className="mt-2" id="length"></input>
           </div>
           
           
            </div>
            </div>


        </form>
    )
}