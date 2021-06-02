import { Link } from 'react-router-dom';

const PrimaryNavigationComponent = () => {
    return(
        <nav>
          <ul>
            <li>
              <Link to="/profil">Profil</Link>
            </li>
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
    );
}

export default PrimaryNavigationComponent;