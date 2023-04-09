import { Routes, Route } from 'react-router-dom';
import Addform from './AddNav';
import Productlist from './ProductList';
import Form from './Form'
export default function AppRoutes({ enabled }) {
  return (
    <Routes>
      <Route path="/" element={<Productlist />} />
      <Route
        path="/addproduct"
        element={ <Addform setEnabled={(value) => enabled(value)} />  }
        
      />
    </Routes>
  );
}