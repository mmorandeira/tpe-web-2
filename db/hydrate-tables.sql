
INSERT INTO app.category (id, name, description, color) VALUES
    (1, 'Supermercado', 'Gastos como leche, pan, articulos de limpieza, etc.', '00BB2D'),
    (2, 'Gastos Fijos', 'Gastos de las tarjetas, deporte, servicios, impuestos, etc.', '00BB2D'),
    (3, 'Salud', 'Gastos relacionados a la salud como farmacia, medicos, etc.', '00BB2D'),
    (4, 'Ocio', 'Gastos como por ejemplo: juegos, salidas, etc.', '00BB2D'),
    (5, 'Transporte', 'Gastos relacionados al transporte, nafta, colectivos, etc.', '00BB2D')
;

INSERT INTO app.expense (id, date, product_name, cost, category_id) VALUES
    (1, '2022-10-01 12:45:56', 'Yerba Mate Mañanita 1kg', 699.0, 1),
    (2, '2022-10-02 12:45:56', 'Cerveza Guinnes Extra Stout 473cc X6', 1581.0, 1),
    (3, '2022-10-03 12:45:56', 'Jabon en barra Dove Original 90g', 183.25, 1),
    (4, '2022-10-04 12:45:56', 'Internet', 5000.0, 2),
    (5, '2022-10-05 12:45:56', 'Alquiler', 30000.0, 2),
    (6, '2022-10-06 12:45:56', 'Abono celular', 1200.0, 2),
    (7, '2022-10-07 12:45:56', 'Ibuprofeno', 321.5, 3),
    (8, '2022-10-08 12:45:56', 'Consulta odontologo', 5200.0, 3),
    (9, '2022-10-09 12:45:56', 'Masajes', 1000.0, 3),
    (10, '2022-10-10 12:45:56', 'Antares', 1423.75, 4),
    (11, '2022-10-11 12:45:56', 'Libro Inteligencia emocional', 4500.0, 4),
    (12, '2022-10-12 12:45:56', 'Cinemacenter', 866.25, 4),
    (13, '2022-10-13 12:45:56', 'Nafta', 3332.58, 5),
    (14, '2022-10-14 12:45:56', 'Saldo sumo', 500.0, 5),
    (15, '2022-10-15 12:45:56', 'Peaje', 77.8, 5)
;
