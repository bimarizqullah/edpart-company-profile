import React, { useEffect, useState } from 'react';

function KategoriList() {
  const [kategori, setKategori] = useState([]);

  useEffect(() => {
      fetch('http://localhost:8000/api/kategori')
        .then(res => res.json())
        .then(result => {
          setKategori(result.data); // Ambil array dari properti data
        })
        .catch(console.error);
    }, []);

  return (
    <div>
        <h2>Daftar Kategori</h2>
      {kategori.length > 0 ? (
        kategori.map(item => (
          <div key={item.id} style={{ marginBottom: '1.5rem', borderBottom: '1px solid #ddd', paddingBottom: '1rem' }}>
            <h3>{item.namaKategori || item.nama}</h3>
            <p>{item.deskripsiKategori || item.deskripsi}</p>
          </div>
        ))
      ) : (
        <p>Loading atau tidak ada data kategori</p>
      )}
    </div>
  );
}

export default KategoriList;
