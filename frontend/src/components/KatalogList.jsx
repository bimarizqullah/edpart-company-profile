import React, { useEffect, useState } from 'react';

function KatalogList() {
  const [katalog, setKatalog] = useState([]); // Inisialisasi array kosong agar tidak undefined

  useEffect(() => {
    fetch('http://localhost:8000/api/katalog')
      .then(res => res.json())
      .then(result => {
        console.log("Data katalog dari API:", result);
        
        // Jika responsenya: { data: [...] }
        // maka setKatalog(result.data)
        // Jika responsenya: { data: { data: [...] } }
        // maka setKatalog(result.data.data)

        const dataArray = result?.data?.data || result?.data || []; 
        setKatalog(dataArray);
      })
      .catch(err => {
        console.error("Gagal mengambil data katalog:", err);
        setKatalog([]); // Tetap set agar aman
      });
  }, []);

  return (
    <div>
      <h2>Daftar Katalog</h2>
      {Array.isArray(katalog) && katalog.length > 0 ? (
        katalog.map(item => (
          <div key={item.id} style={{ marginBottom: '2rem', borderBottom: '1px solid #ccc', paddingBottom: '1rem' }}>
            <h3>{item.namaKatalog}</h3>
            <p>{item.deskripsiKatalog}</p>

            {/* Tampilkan produk jika ada */}
            {Array.isArray(item.produk) && item.produk.length > 0 ? (
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
