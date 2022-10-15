
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
    (4, '2022-10-04 12:45:56', '', 0.0, 1),
    (5, '2022-10-05 12:45:56', '', 0.0, 1),
    (6, '2022-10-06 12:45:56', '', 0.0, 1),
    (7, '2022-10-07 12:45:56', '', 0.0, 1),
    (8, '2022-10-08 12:45:56', '', 0.0, 1),
    (9, '2022-10-09 12:45:56', '', 0.0, 1),
    (10, '2022-10-10 12:45:56', '', 0.0, 1),
    (11, '2022-10-11 12:45:56', '', 0.0, 1),
    (12, '2022-10-12 12:45:56', '', 0.0, 1),
    (13, '2022-10-13 12:45:56', '', 0.0, 1),
    (14, '2022-10-14 12:45:56', '', 0.0, 1),
    (15, '2022-10-15 12:45:56', '', 0.0, 1)
;
