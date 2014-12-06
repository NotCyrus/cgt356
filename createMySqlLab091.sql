CREATE TABLE Product(
	ProductID       int PRIMARY KEY,
	ProductName     varchar (40),
	SupplierID      int (4),
	CategoryID      int (4),
	QuantityPerUnit varchar (20),
	UnitPrice       int,
	UnitsInStock    int (4),
	UnitsOnOrder    int (4),
	ReorderLevel    int (4),
	Discontinued    int (4)
);

CREATE TABLE OrderDetails(
	OrderID     int REFERENCES Orders(OrderID),
	ProductID   int REFERENCES Product(ProductID),
	UnitPrice   int,
    Quantity    int,
    Discount    decimal,
    PRIMARY KEY(OrderID, ProductID)
);

CREATE TABLE Orders(
	OrderID			int PRIMARY KEY,
    CustomerID		char (5) REFERENCES Customer(CustomerID),
    EmployeeID		int (4) REFERENCES Employee(EmployeeID),
    OrderDate		datetime,
    RequiredDate	datetime,
    ShippedDate		datetime,
    ShipVia			int (4) REFERENCES Shipper(ShipperID),
    Freight			int,
    ShipName		varchar (40),
    ShipAddress		varchar (60),
    ShipCity		varchar (15),
    ShipRegion		varchar (15),
    ShipPostalCode	varchar (15),
    ShipCountry		varchar (15)
);

CREATE TABLE Employee(
	EmployeeID 		 int PRIMARY KEY,
	LastName		 varchar (20),
    FirstName 		 varchar (10),
    Title			 varchar (30),
    TitleOfCourtesy	 varchar (25),
    BirthDate		 datetime,
    HireDate		 datetime,
    Address			 varchar (60),
    City 			 varchar (15),
    Region			 varchar (15),
    PostalCode 		 varchar (10),
    Country 		 varchar (15),
    HomePhone 		 varchar (24),
    Extension 		 varchar (4),
    Photo 			 varchar (60),
    Notes			 varchar (60),
    ReportsTo 		 int
);

CREATE TABLE Customer(
	CustomerID  	char (5) PRIMARY KEY,
	CompanyName 	varchar (40),
    ContactName 	varchar (30),
    ContactTitle 	varchar (30),
    Address 		varchar (60),
    City 			varchar (15),
    Region 			varchar (15),
    PostalCode 		varchar (10),
    Country 		varchar (15),
    Phone 			varchar (24),
	Fax       		varchar (24) 
);

CREATE TABLE Shipper(
	ShipperID   int PRIMARY KEY,
	CompanyName varchar (40),
	Phone       varchar (24) 
);
