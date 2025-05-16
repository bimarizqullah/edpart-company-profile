import React, { useEffect, useState } from 'react';

function KategoriList() {
  const [kategori, setKategori] = useState([]); // ✅ inisialisasi sebagai array kosong

  useEffect(() => {
    fetch("http://localhost:8000/api/kategori")
      .then(res => res.json())
      .then(result => {
        console.log("Data kategori:", result); // ⬅️ Debug dulu
        // pastikan `result.data` adalah array
        setKategori(result.data); // ✅ perbaiki ini jika data array langsung
      })
      .catch(err => console.error("Gagal fetch:", err));
  }, []);

  return (
    <div>
      <h2>Daftar Kategori</h2>
      {Array.isArray(kategori) && kategori.length > 0 ? (
        kategori.map((item) => (
          <div key={item.id}>
            <p>{item.namaKategori}</p>
          </div>
        ))
      ) : (
        <p>Loading atau tidak ada data</p>
      )}
    </div>
  );
}

export default KategoriList;
