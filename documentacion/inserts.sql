USE bdjanytours;

-- Estados

INSERT INTO estados(descripcion) values
	('activo'),
	('inactivo'),
    ('programado');

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