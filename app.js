// 1. Arrays iniciales
const productos = ["Arepa", "Empanada", "Buñuelo", "Jugo"];
const precios = [3000, 3500, 2000, 4000];

// 2. Agregar elementos
productos.push("Café");
precios.push(2500);

productos.push("Gaseosa");
precios.push(3000);

// 3. Eliminar el último elemento
productos.pop();
precios.pop();

// 4. Buscar con includes
console.log(productos.includes("Jugo"));

// 5. Filtrar precios
const baratos = precios.filter(p => p <= 3000);

// 6. Transformar datos (precio + IVA)
const conIva = precios.map(p => Math.round(p * 1.19));

console.log(baratos);
console.log(conIva);

// 7. Pintar lista completa en la página
const lista = document.getElementById("lista");

productos.forEach((p, i) => {
  const li = document.createElement("li");
  li.textContent = `${p} - $${precios[i]}`;
  lista.appendChild(li);
});

// Reto extra: Pintar solo la lista filtrada
const listaFiltrados = document.getElementById("lista-filtrados");

productos.forEach((p, i) => {
  if (precios[i] <= 3000) {
    const li = document.createElement("li");
    li.textContent = `${p} - $${precios[i]}`;
    listaFiltrados.appendChild(li);
  }
});