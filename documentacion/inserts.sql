USE bd_janytours;

-- Estados

INSERT INTO estados(descripcion) values
	('activo'),
	('inactivo'),
    ('programado'),
    ('entregado'),
    ('reservado');

-- Agencias

INSERT INTO agencias(direccion, telefono, celular, ubigeo_id, estado_id) values
	('Jr. Lima', '564065', '564065', '5', '1'),
    ('Ca. Aguas', '564065', '564065', '25', '1'),
    ('Av. Las pilas', '564065', '564065', '52', '1');
    
-- Buses

INSERT INTO buses(placa, chasis, anio, motor, estado_id) values
	('asda', 'dsaeq', '2014', 'asdqwe', '1');
    
-- Conductores

INSERT INTO conductores(persona_id, licencia, categoria, estado_id) values
	('1', 'asdasdas', 'A1', '1');
    
-- Servicios

INSERT INTO servicios(descripcion, estado_id) values
	('VIP', '1'),
    ('Especial', '1');
    
-- Desplazamientos

INSERT INTO desplazamientos(origen, destino) values
	(2,	3),
	(2,	4),
	(3,	2),
	(3,	4),
	(4,	2),
	(4,	3);
    
-- Tarifas

INSERT INTO tarifas(servicio_id, desplazamiento_id, precio_min, precio_max, tiempo) values
	(1,	1,	12.00,	23.00,	2),
	(1,	2,	12.00,	23.00,	2),
	(1,	3,	12.00,	23.00,	23),
	(1,	4,	12.00,	23.00,	23),
	(1,	5,	4.00,	2.00,	54),
	(1,	6,	4.00,	2.00,	54);
    
-- Tipo de Productos

INSERT INTO tipo_productos(descripcion, valor, estado_id) values
	('sobre', 15, 1),
    ('caja', 20, 1);
    
-- Groups

INSERT INTO groups(descripcion, estado_id) values
	('Administrador', 1),
    ('Vendedor', 1);
    
-- Users

INSERT INTO users(username, password, estado_id) values
	('admin', '$2y$10$U1ZB/...NbULjpLzLq/nhuPGDPFvKyRgZiyzlYu22J.GvzECOGyHO', 1),
    ('acruzado', '$10$2xjVroewUfT0VNQ2j8AVi.5EMrWUj.QDu7OzWzZ4JtKibuWVked6W', 1);
    
-- User_detalles

INSERT INTO user_detalles(user_id, group_id, agencia_id, estado_id) values
	(1, 1, null, 1),
    (2, 2, 2, 1);