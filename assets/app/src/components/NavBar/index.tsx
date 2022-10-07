import React from 'react';
import Navbar from "react-bootstrap/Navbar";
import Container from "react-bootstrap/Container";
import Nav from "react-bootstrap/Nav";
import {Link} from "react-router-dom";

const NavBar = () => {
	return (
		<Navbar expand="lg" bg="primary" variant="dark">
			<Container>
				<Navbar.Brand href="/">
					Fake DB
				</Navbar.Brand>
				<Navbar.Toggle aria-controls="responsive-navbar-nav" />
				<Navbar.Collapse id="responsive-navbar-nav">
					<Nav>
						<Link className="nav-link" to="/" >Home</Link>
					</Nav>
					<Nav>
						<Link className="nav-link" to="/posts" >Posts</Link>
					</Nav>
					<Nav>
						<Link className="nav-link" to="/create" >Create Post</Link>
					</Nav>
				</Navbar.Collapse>
			</Container>
		</Navbar>
	);
};

export default NavBar;
