import React from 'react';
import githubLogo from "../../assets/github-logo.png"
import linkedinLogo from "../../assets/linkedin-logo.png"

import "./NavBar.scss"

export const NavBar = () => {
    return (
        <nav className="navbar-container">
            <div className="navbar-item">
                <a href="https://github.com/survivorbat" target="_blank" rel="noopener noreferrer">
                    <img src={githubLogo} alt="GitHub"/>
                </a>
            </div>
            <div className="navbar-item">
                <a href="https://www.linkedin.com/in/maarten-van-der-heijden-webdev/" target="_blank" rel="noopener noreferrer">
                    <img src={linkedinLogo} alt="LinkedIn"/>
                </a>
            </div>
        </nav>
    )
}
