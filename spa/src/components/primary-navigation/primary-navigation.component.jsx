import { Link } from 'react-router-dom';
import { Navbar, Nav, Container } from 'react-bootstrap';

const PrimaryNavigationComponent = () => {
    return(
<<<<<<< HEAD
        <nav>
          <ul>           
            <li>
              <Link to="/">Home</Link>
            </li>
            <li>
              <Link to="/about">About</Link>
            </li>
            <li>
              <Link to="/contacts">Contact</Link>
            </li>
          </ul>
        </nav>
=======
      <Navbar bg="light" expand="lg">
        <Container>
          <Navbar.Brand href="#home">SPA</Navbar.Brand>
          <Navbar.Toggle aria-controls="basic-navbar-nav" />
          <Navbar.Collapse id="basic-navbar-nav">
            <Nav className="me-auto">
              <Nav.Link as={Link} to="/" >Home</Nav.Link>
              <Nav.Link as={Link} to="/about" >About</Nav.Link>
              <Nav.Link as={Link} to="/auth" >SignUp / Login</Nav.Link>
            </Nav>
          </Navbar.Collapse>
        </Container>
      </Navbar>
>>>>>>> b4ede4d6ef3adafe2c8a09d9f80e27e7bc48c4e1
    );
}

export default PrimaryNavigationComponent;