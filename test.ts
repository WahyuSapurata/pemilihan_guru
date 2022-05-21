interface Output {
  name: string;
  pendidikan: number;
  ipk: number;
  pengalaman: number;
  tkd: number;
  wawancara: number;
  result: number;
}

let ctr = [
  {
    id_kriteria: 17,
    kode: "k02",
    nama_kriteria: "IPK",
    atribut: "Benefit",
    bobot: 3,
    bobot_kalkulasi: 0.16666666666667,
  },
  {
    id_kriteria: 18,
    kode: "k03",
    nama_kriteria: "Pendidikan",
    atribut: "Benefit",
    bobot: 5,
    bobot_kalkulasi: 0.27777777777778,
  },
  {
    id_kriteria: 19,
    kode: "k04",
    nama_kriteria: "Pengalaman",
    atribut: "Benefit",
    bobot: 5,
    bobot_kalkulasi: 0.27777777777778,
  },
  {
    id_kriteria: 20,
    kode: "k05",
    nama_kriteria: "Tes Kemampuan Dasar",
    atribut: "Benefit",
    bobot: 3,
    bobot_kalkulasi: 0.16666666666667,
  },
  {
    id_kriteria: 22,
    kode: "k07",
    nama_kriteria: "Tes Wawancara",
    atribut: "Benefit",
    bobot: 2,
    bobot_kalkulasi: 0.11111111111111,
  },
];
const alt = [
  {
    id_alternatif: 12,
    nama: "wahyu",
    jenis_kelamin: "Laki-laki",
    alamat: "sinaji",
    ipk: 4,
    pendidikan: 80,
    pengalaman: 80,
    tkd: 90,
    wawancara: 100,
  },
  {
    id_alternatif: 13,
    nama: "coding",
    jenis_kelamin: "Laki-laki",
    alamat: "pakkalolo",
    ipk: 4,
    pendidikan: 70,
    pengalaman: 60,
    tkd: 100,
    wawancara: 100,
  },
  {
    id_alternatif: 14,
    nama: "saleh",
    jenis_kelamin: "Laki-laki",
    alamat: "sinaji",
    ipk: 3,
    pendidikan: 100,
    pengalaman: 60,
    tkd: 80,
    wawancara: 84,
  },
  {
    id_alternatif: 15,
    nama: "wawal",
    jenis_kelamin: "Laki-laki",
    alamat: "gowa",
    ipk: 3,
    pendidikan: 70,
    pengalaman: 70,
    tkd: 90,
    wawancara: 84,
  },
];

const outputs: Output[] = [];
const ctr_label = ["ipk", "pendidikan", "pengalaman", "tkd", "wawancara"];
const ctr_sum: number[][] = [];
for (let index_1 = 0; index_1 < ctr_label.length; index_1++) {
  const label = ctr_label[index_1];
  const sum: number[] = [];
  for (let index_2 = 0; index_2 < alt.length; index_2++) {
    sum.push(alt[index_2][label]);
  }
  // ctr_sum.push(sum);
  const max = Math.max(...sum);
  const min = Math.min(...sum);
  for (let index_2 = 0; index_2 < alt.length; index_2++) {
    const element = alt[index_2];
    if (!outputs[index_2]) {
      outputs.push({
        name: element.nama,
        ipk: element.ipk,
        pendidikan: element.pendidikan,
        pengalaman: element.pengalaman,
        tkd: element.tkd,
        wawancara: element.wawancara,
        result: 0,
      });
    }
    if (ctr[index_1].atribut == "Benefit") {
      outputs[index_2][label] = max / element[label];
    } else {
      outputs[index_2][label] = min / element[label];
    }
  }
}
for (let index_1 = 0; index_1 < outputs.length; index_1++) {
  const sum: number[] = [
    outputs[index_1].ipk * ctr[0].bobot,
    outputs[index_1].pendidikan * ctr[1].bobot,
    outputs[index_1].pengalaman * ctr[2].bobot,
    outputs[index_1].tkd * ctr[3].bobot,
    outputs[index_1].wawancara * ctr[4].bobot,
  ];
  outputs[index_1].result = sum.reduce((prev, curr) => prev + curr);
}
console.table(outputs);
