import React, { useEffect, useState } from 'react';

function ProdukList() {
  const [produk, setProduk] = useState([]);

  useEffect(() => {
    fetch('http://localhost:8000/api/produk')
      .then(res => res.json())
      .then(data => setProduk(data))
      .catch(console.error);
  }, []);

  return (
    <div>
      <h2>Daftar Produk</h2>
      <ul>
        {produk.map(p => (
          <li key={p.id}>{p.nama}</li>
        ))}
      </ul>
    </div>
  );
}

export default ProdukList;
