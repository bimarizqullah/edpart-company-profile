import React from 'react';
import KategoriList from './components/KategoriList';
import KatalogList from './components/KatalogList';
import ProdukList from './components/ProdukList';

function App() {
  return (
    <div className="App">
      <h1>Company Profile</h1>
      <KategoriList />
      <KatalogList />
      <ProdukList />
    </div>
  );
}

export default App;
