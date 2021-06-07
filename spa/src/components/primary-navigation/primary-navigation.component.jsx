import { Link } from 'react-router-dom';
import { Navbar, Nav, Container } from 'react-bootstrap';

const PrimaryNavigationComponent = () => {
    return(
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
    );
}

export default PrimaryNavigationComponent;