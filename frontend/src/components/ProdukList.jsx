import React, { useEffect, useState } from 'react';

function ProdukList() {
  const [produk, setProduk] = useState([]);

  useEffect(() => {
    fetch('http://localhost:8000/api/produk')
      .then(res => res.json())
      .then(result => {
        console.log("Hasil API:", result);

        // Periksa struktur responsenya
        const dataArray = result?.data?.data || result?.data || [];

        setProduk(dataArray); // Pasti array
      })
      .catch(error => {
        console.error("Gagal mengambil data produk:", error);
        setProduk([]); // Fallback agar tidak undefined
      });
  }, []);

  return (
    <div>
      <h2>Daftar Produk</h2>
      {Array.isArray(produk) && produk.length > 0 ? (
        <ul>
          {produk.map(p => (
            <li key={p.id}>{p.namaProduk}</li> 
          ))}
        </ul>
      ) : (
        <p>Tidak ada data produk</p>
      )}
    </div>
  );
}

export default ProdukList;
