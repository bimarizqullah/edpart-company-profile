import React, { useEffect, useState } from 'react';

function KatalogList() {
  const [katalog, setKatalog] = useState([]);

  useEffect(() => {
    fetch('http://localhost:8000/api/katalog')
      .then(res => res.json())
      .then(result => {
        setKatalog(result.data); // Ambil array dari properti data
      })
      .catch(console.error);
  }, []);

  return (
    <div>
        <h2>Daftar Katalog</h2>
      {katalog.length > 0 ? (
        katalog.map(item => (
          <div key={item.id} style={{ marginBottom: '2rem', borderBottom: '1px solid #ccc', paddingBottom: '1rem' }}>
            <h3>{item.namaKatalog}</h3>
            <p>{item.deskripsiKatalog}</p>
            {/* Tampilkan produk di dalam katalog */}
            {item.produk.length > 0 ? (
              <ul>
                {item.produk.map(produk => (
                  <li key={produk.id}>
                    {produk.namaProduk} - Rp {produk.harga.toLocaleString('id-ID')}
                  </li>
                ))}
              </ul>
            ) : (
              <p>Tidak ada produk</p>
            )}
          </div>
        ))
      ) : (
        <p>Loading atau tidak ada data katalog</p>
      )}
    </div>
  );
}

export default KatalogList;
