import { Routes, Route } from 'react-router-dom';
import Addform from './AddNav';
import Productlist from './productlist';
import Form from './form'
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